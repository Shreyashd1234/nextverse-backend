<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Lead;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::orderBy('scheduled_at', 'desc')->get();

        return view('meetings.index', ['meetings' => $meetings]);
    }

    public function create()
    {
        $leads = Lead::where('status', '!=', 'converted')->get();

        return view('meetings.create', ['leads' => $leads]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lead_id' => ['required', 'integer', 'exists:leads,id'],
            'title' => ['required', 'string', 'max:255'],
            'scheduled_at' => ['required', 'date_format:Y-m-d\TH:i'],
            'remarks' => ['nullable', 'string'],
        ]);

        Meeting::create([
            'lead_id' => $validated['lead_id'],
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'scheduled_at' => Carbon::parse($validated['scheduled_at']),
            'remarks' => $validated['remarks'] ?? null,
        ]);

        return redirect('/meetings');
    }

    public function apiIndex()
    {
        $apiUser = request()->user();
        $query = Meeting::query();

        if ($apiUser && $apiUser->role === 'growth') {
            $query->where('user_id', $apiUser->id);
        }

        if ($apiUser && $apiUser->role === 'client') {
            $client = \App\Models\Client::where('user_id', $apiUser->id)->first();
            if ($client) {
                $query->where('lead_id', $client->lead_id);
            } else {
                $query->whereRaw('1=0');
            }
        }

        $meetings = $query->orderBy('scheduled_at', 'asc')->get();

        return response()->json($meetings);
    }

    public function apiStore(Request $request)
    {
        $user = $request->user();
        if (! $user || $user->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'lead_id' => ['required', 'integer', 'exists:leads,id'],
            'title' => ['required', 'string', 'max:255'],
            'scheduled_at' => ['required', 'date'],
            'status' => ['nullable', 'string', 'max:255'],
            'remarks' => ['nullable', 'string'],
        ]);

        $meeting = Meeting::create([
            'lead_id' => $validated['lead_id'],
            'user_id' => $user->id,
            'title' => $validated['title'],
            'scheduled_at' => Carbon::parse($validated['scheduled_at']),
            'status' => $validated['status'] ?? 'scheduled',
            'remarks' => $validated['remarks'] ?? null,
        ]);

        return response()->json($meeting, 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $meeting = Meeting::findOrFail($id);

        if ($apiUser->role === 'growth' && (int) $meeting->user_id !== (int) $apiUser->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'scheduled_at' => ['required', 'date'],
            'status' => ['required', 'string', 'max:255'],
            'remarks' => ['nullable', 'string'],
        ]);

        $meeting->update([
            'title' => $validated['title'],
            'scheduled_at' => Carbon::parse($validated['scheduled_at']),
            'status' => $validated['status'],
            'remarks' => $validated['remarks'] ?? null,
        ]);

        return response()->json($meeting->fresh());
    }

    public function apiDestroy($id)
    {
        $apiUser = request()->user();
        if (! $apiUser || ! in_array($apiUser->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $meeting = Meeting::findOrFail($id);

        if ($apiUser->role === 'growth' && (int) $meeting->user_id !== (int) $apiUser->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $meeting->delete();

        return response()->json(['message' => 'Meeting deleted']);
    }

    public function generateMoM(Request $request)
    {
        $validated = $request->validate([
            'meeting_title' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'string', 'max:255'],
            'discussion_points' => ['required', 'string'],
            'decisions' => ['nullable', 'string'],
        ]);

        $meetingDate = ! empty($validated['date'])
            ? Carbon::parse($validated['date'])
            : now();

        $formattedText = "Meeting Title: {$validated['meeting_title']}\n"
            . "Client Name: {$validated['client_name']}\n"
            . "Date: {$meetingDate->format('d-m-Y')}\n"
            . "Time: {$meetingDate->format('h:i A')}\n\n"
            . "Discussion Summary\n{$validated['discussion_points']}\n\n"
            . "Decisions Made\n" . ($validated['decisions'] ?? 'N/A');

        return response()->json([
            'title' => $validated['meeting_title'],
            'formatted_text' => $formattedText,
        ]);
    }
}

