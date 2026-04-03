<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Project;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function getStats(Request $request)
    {
        try {
            $apiUser = $request->user();
            if (! $apiUser) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }

            $leadsQuery = Lead::query();
            $meetingsQuery = Meeting::query();
            $clientsQuery = Client::query();

            if ($apiUser->role === 'growth') {
                $leadsQuery->where('assigned_to', $apiUser->id);
                $meetingsQuery->where('user_id', $apiUser->id);
                $clientsQuery->where('assigned_growth_id', $apiUser->id);
            }

            if ($apiUser->role === 'client') {
                $client = Client::where('user_id', $apiUser->id)->first();
                if (! $client) {
                    return response()->json([
                        'leads' => 0,
                        'meetings' => 0,
                        'clients' => 0,
                        'users' => 0,
                        'conversion' => 0,
                    ]);
                }

                $leadsQuery->where('id', $client->lead_id);
                $meetingsQuery->where('lead_id', $client->lead_id);
                $clientsQuery->where('id', $client->id);
            }

            $leads = (int) $leadsQuery->count();
            $meetings = (int) $meetingsQuery->count();
            $clients = (int) $clientsQuery->count();
            $users = $apiUser->role === 'admin' ? (int) \App\Models\User::count() : 0;
            $conversion = $leads > 0 ? round(($clients / $leads) * 100, 2) : 0;

            return response()->json([
                'leads' => $leads,
                'meetings' => $meetings,
                'clients' => $clients,
                'users' => $users,
                'conversion' => $conversion,
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => 'Failed to load dashboard stats',
                'leads' => 0,
                'meetings' => 0,
                'clients' => 0,
                'users' => 0,
                'conversion' => 0,
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $now = Carbon::now();

        $meetings_30m = Meeting::whereBetween('scheduled_at', [
            $now,
            $now->clone()->addMinutes(30)
        ])->orderBy('scheduled_at')->get();

        $meetings_1h = Meeting::whereBetween('scheduled_at', [
            $now->clone()->addMinutes(30),
            $now->clone()->addHour()
        ])->orderBy('scheduled_at')->get();

        $meetings_6h = Meeting::whereBetween('scheduled_at', [
            $now->clone()->addHour(),
            $now->clone()->addHours(6)
        ])->orderBy('scheduled_at')->get();

        $missed_meetings = Meeting::where('scheduled_at', '<', $now)
            ->where('status', 'scheduled')
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('dashboard', [
            'user' => $user,
            'meetings_30m' => $meetings_30m,
            'meetings_1h' => $meetings_1h,
            'meetings_6h' => $meetings_6h,
            'missed_meetings' => $missed_meetings,
        ]);
    }

    public function priorityTasks()
    {
        $apiUser = request()->user();
        $now = Carbon::now();

        $meetingQuery = Meeting::query();
        $leadQuery = Lead::query();

        if ($apiUser && $apiUser->role === 'growth') {
            $meetingQuery->where('user_id', $apiUser->id);
            $leadQuery->where('assigned_to', $apiUser->id);
        }

        if ($apiUser && $apiUser->role === 'client') {
            $client = Client::where('user_id', $apiUser->id)->first();
            if ($client) {
                $meetingQuery->where('lead_id', $client->lead_id);
                $leadQuery->where('id', $client->lead_id);
            } else {
                $meetingQuery->whereRaw('1=0');
                $leadQuery->whereRaw('1=0');
            }
        }

        $meetingTasks = $meetingQuery
            ->whereBetween('scheduled_at', [$now, $now->copy()->addHours(24)])
            ->orderBy('scheduled_at', 'asc')
            ->limit(5)
            ->get()
            ->map(function (Meeting $meeting) {
                return [
                    'type' => 'meeting',
                    'title' => 'Meeting with ' . $meeting->title . ' at ' . $meeting->scheduled_at->format('g:i A'),
                    'time' => $meeting->scheduled_at->toIso8601String(),
                ];
            });

        $leadTasks = $leadQuery
            ->whereIn('status', ['new', 'pending'])
            ->orderByDesc('created_at')
            ->limit(5)
            ->get()
            ->map(function (Lead $lead) {
                return [
                    'type' => 'lead',
                    'title' => 'Follow up with ' . $lead->business_name,
                    'time' => optional($lead->created_at)->toIso8601String(),
                ];
            });

        $tasks = $meetingTasks
            ->concat($leadTasks)
            ->sortBy(function (array $task) {
                return $task['type'] === 'meeting' ? 0 : 1;
            })
            ->take(5)
            ->values();

        return response()->json($tasks);
    }
}

