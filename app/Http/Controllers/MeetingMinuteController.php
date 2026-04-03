<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conversation;
use App\Models\Meeting;
use App\Models\MeetingMinute;
use App\Models\Message;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeetingMinuteController extends Controller
{
    public function saveGenerated(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || ! in_array($apiUser->role, ['growth', 'admin'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'meeting_id' => ['required', 'integer', 'exists:meetings,id'],
            'title' => ['required', 'string', 'max:255'],
            'client_name' => ['required', 'string', 'max:255'],
            'agenda' => ['required', 'string'],
            'discussion' => ['required', 'string'],
            'decisions' => ['required', 'string'],
            'actions' => ['required', 'string'],
        ]);

        $meeting = Meeting::findOrFail($validated['meeting_id']);
        if ($apiUser->role === 'growth' && (int) $meeting->user_id !== (int) $apiUser->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $discussion = "The meeting focused on {$validated['discussion']}. The discussion emphasized the importance of maintaining a professional, structured, and business-oriented approach.";
        $decisions = "Key decisions taken during the meeting include {$validated['decisions']}. These decisions are aligned with the overall project direction.";
        $actions = "The following action items were agreed upon: {$validated['actions']}. These will be executed in the upcoming phase.";

        $pdfData = [
            'client_name' => $validated['client_name'],
            'title' => $validated['title'],
            'date' => now()->format('d-m-Y'),
            'time' => now()->format('h:i A'),
            'agenda' => $validated['agenda'],
            'discussion' => $discussion,
            'decisions' => $decisions,
            'actions' => $actions,
        ];

        $fileName = str_replace(' ', '_', $validated['client_name']) . '_Minutes_of_Meeting.pdf';
        $filePath = 'mom/' . $fileName;

        $pdf = Pdf::loadView('pdf.mom', $pdfData);
        Storage::disk('public')->put($filePath, $pdf->output());
        $fileUrl = asset('storage/' . $filePath);

        $structuredContent = json_encode($pdfData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        $minute = MeetingMinute::updateOrCreate(
            ['meeting_id' => $meeting->id],
            [
                'growth_user_id' => $apiUser->id,
                'title' => $pdfData['title'],
                'agenda' => $pdfData['agenda'],
                'discussion' => $structuredContent,
                'content' => $structuredContent,
                'decisions' => $pdfData['decisions'],
                'action_items' => $pdfData['actions'],
                'confirmed_at' => now(),
                'pdf_url' => $fileUrl,
                'file_path' => $filePath,
            ]
        );

        $client = Client::where('lead_id', $meeting->lead_id)->first();
        $conversation = $client
            ? Conversation::where('client_id', $client->id)->where('type', 'group')->first()
            : null;

        if ($conversation) {
            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $apiUser->id,
                'receiver_id' => null,
                'message' => json_encode([
                    'title' => 'Minutes of Meeting',
                    'url' => $fileUrl,
                ], JSON_UNESCAPED_SLASHES),
                'type' => 'mom_pdf',
            ]);

            $conversation->touch();
        }

        return response()->json([
            'message' => 'MoM saved successfully',
            'file_url' => $fileUrl,
            'mom' => [
                'id' => $minute->id,
                'meeting_id' => $minute->meeting_id,
                'title' => $minute->title,
                'content' => $minute->content ?? $minute->discussion,
                'file_path' => $minute->file_path,
                'created_at' => $minute->created_at,
            ],
        ]);
    }

    public function momHistory(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || ! in_array($apiUser->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $query = MeetingMinute::query()->with('meeting:id,title,scheduled_at,user_id');
        if ($apiUser->role === 'growth') {
            $query->where('growth_user_id', $apiUser->id);
        }

        $history = $query
            ->orderByDesc('created_at')
            ->get()
            ->map(function (MeetingMinute $minute) {
                return [
                    'id' => $minute->id,
                    'meeting_id' => $minute->meeting_id,
                    'meeting_title' => $minute->meeting?->title,
                    'title' => $minute->title,
                    'content' => $minute->content ?? $minute->discussion,
                    'created_at' => $minute->created_at,
                ];
            })
            ->values();

        return response()->json($history);
    }

    public function indexByMeeting(Request $request, $meetingId)
    {
        $apiUser = $request->user();
        if (! $apiUser) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $meeting = Meeting::findOrFail($meetingId);
        $minute = MeetingMinute::where('meeting_id', $meeting->id)->latest()->first();

        if (! $minute) {
            return response()->json(['message' => 'Minutes not found'], 404);
        }

        if ($apiUser->role === 'client') {
            $client = \App\Models\Client::where('user_id', $apiUser->id)->first();
            if (! $client || (int) $client->lead_id !== (int) $meeting->lead_id) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            return response()->json([
                'id' => $minute->id,
                'meeting_id' => $minute->meeting_id,
                'title' => $minute->title,
                'summary' => mb_substr((string) $minute->discussion, 0, 240),
                'decisions' => $minute->decisions,
                'action_items' => $minute->action_items,
            ]);
        }

        return response()->json($minute);
    }

    public function store(Request $request, $meetingId)
    {
        $apiUser = $request->user();
        if (! $apiUser || ! in_array($apiUser->role, ['growth', 'admin'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $meeting = Meeting::findOrFail($meetingId);
        if ($meeting->status !== 'completed') {
            return response()->json(['message' => 'Meeting must be completed before generating minutes'], 422);
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'agenda' => ['required', 'string'],
            'discussion' => ['required', 'string'],
            'decisions' => ['required', 'string'],
            'action_items' => ['required', 'string'],
            'confirm' => ['nullable', 'boolean'],
        ]);

        $minute = MeetingMinute::updateOrCreate(
            ['meeting_id' => $meeting->id],
            [
                'growth_user_id' => $apiUser->id,
                'title' => $validated['title'],
                'agenda' => $validated['agenda'],
                'discussion' => $validated['discussion'],
                'decisions' => $validated['decisions'],
                'action_items' => $validated['action_items'],
                'confirmed_at' => ($validated['confirm'] ?? false) ? now() : null,
                'pdf_url' => '/api/meeting-minutes/' . $meeting->id . '/download',
            ]
        );

        return response()->json([
            'message' => 'Meeting minutes saved',
            'minutes' => $minute,
            'download_url' => '/api/meeting-minutes/' . $minute->id . '/download',
        ]);
    }

    public function download(Request $request, $id)
    {
        $apiUser = $request->user();
        if (! $apiUser) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if ($apiUser->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $minute = MeetingMinute::findOrFail($id);

        if (! empty($minute->file_path) && Storage::disk('public')->exists($minute->file_path)) {
            return response()->download(
                storage_path('app/public/' . $minute->file_path),
                basename($minute->file_path),
                ['Content-Type' => 'application/pdf']
            );
        }

        $content = "MINUTES OF MEETING\n\n"
            . "Title: {$minute->title}\n"
            . "Agenda:\n{$minute->agenda}\n\n"
            . "Discussion:\n{$minute->discussion}\n\n"
            . "Decisions:\n{$minute->decisions}\n\n"
            . "Action Items:\n{$minute->action_items}\n";

        return response($content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="mom-' . $minute->id . '.pdf"',
        ]);
    }
}

