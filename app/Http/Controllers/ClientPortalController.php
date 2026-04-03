<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Meeting;
use App\Models\MeetingMinute;
use App\Models\Payment;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Service;
use Illuminate\Http\Request;

class ClientPortalController extends Controller
{
    public function dashboard(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role !== 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $client = Client::where('user_id', $apiUser->id)->first();
        if (! $client) {
            return response()->json(['message' => 'Client profile not found'], 404);
        }

        $project = Project::where('client_id', $client->id)->first();
        $tasksDone = $project ? $project->tasks()->where('status', 'done')->count() : 0;
        $tasksPending = $project ? $project->tasks()->where('status', '!=', 'done')->count() : 0;

        $meetingIds = Meeting::where('lead_id', $client->lead_id)->pluck('id');
        $meetingsCompleted = Meeting::whereIn('id', $meetingIds)->where('status', 'completed')->count();

        $meetings = Meeting::where('lead_id', $client->lead_id)
            ->orderBy('scheduled_at', 'desc')
            ->limit(6)
            ->get(['id', 'title', 'scheduled_at', 'status']);

        $updates = collect();
        if ($project) {
            $taskUpdates = ProjectTask::where('project_id', $project->id)
                ->orderByDesc('updated_at')
                ->limit(8)
                ->get()
                ->map(function ($task) {
                    return [
                        'type' => 'task',
                        'title' => $task->title,
                        'status' => $task->status,
                        'time' => $task->updated_at,
                    ];
                });

            $updates = $updates->concat($taskUpdates);
        }

        $meetingUpdates = Meeting::where('lead_id', $client->lead_id)
            ->orderByDesc('updated_at')
            ->limit(8)
            ->get()
            ->map(function ($meeting) {
                return [
                    'type' => 'meeting',
                    'title' => $meeting->title,
                    'status' => $meeting->status,
                    'time' => $meeting->updated_at,
                ];
            });

        $updates = $updates->concat($meetingUpdates)
            ->sortByDesc('time')
            ->take(10)
            ->values();

        $serviceText = $client->service_type ?? 'Website Development';
        $services = collect(explode(',', $serviceText))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values();

        if ($services->isEmpty()) {
            $services = collect(['Website Development']);
        }

        return response()->json([
            'project' => [
                'name' => $project?->name,
                'progress' => $project?->progress ?? 0,
                'status' => $project?->status ?? 'active',
            ],
            'metrics' => [
                'tasks_done' => $tasksDone,
                'tasks_pending' => $tasksPending,
                'meetings_completed' => $meetingsCompleted,
            ],
            'meetings' => $meetings,
            'updates_timeline' => $updates,
            'services' => $services,
            'analytics' => [
                'progress_chart' => [20, 35, 48, 62, 75, $project?->progress ?? 0],
                'conversion_chart' => [15, 23, 39, 51, 68, 74],
                'meeting_completion' => [$meetingsCompleted, max(0, 10 - $meetingsCompleted)],
            ],
        ]);
    }

    public function meetings(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role !== 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $client = Client::where('user_id', $apiUser->id)->first();
        if (! $client) {
            return response()->json(['message' => 'Client profile not found'], 404);
        }

        $meetings = Meeting::where('lead_id', $client->lead_id)->orderBy('scheduled_at', 'desc')->get();
        $now = now();

        $upcoming = $meetings->filter(fn ($meeting) => $meeting->scheduled_at >= $now)->values();
        $past = $meetings->filter(fn ($meeting) => $meeting->scheduled_at < $now)->values();

        $minutes = MeetingMinute::whereIn('meeting_id', $meetings->pluck('id'))->get()->keyBy('meeting_id');

        $mapMeeting = function ($meeting) use ($minutes) {
            $minute = $minutes->get($meeting->id);

            return [
                'id' => $meeting->id,
                'title' => $meeting->title,
                'scheduled_at' => $meeting->scheduled_at,
                'status' => $meeting->status,
                'minutes' => $minute ? [
                    'id' => $minute->id,
                    'title' => $minute->title,
                    'summary' => mb_substr((string) $minute->discussion, 0, 240),
                ] : null,
            ];
        };

        return response()->json([
            'upcoming' => $upcoming->map($mapMeeting)->values(),
            'past' => $past->map($mapMeeting)->values(),
        ]);
    }

    public function payments(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role !== 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $client = Client::where('user_id', $apiUser->id)->first();
        if (! $client) {
            return response()->json(['message' => 'Client profile not found'], 404);
        }

        $project = Project::where('client_id', $client->id)->first();
        if (! $project) {
            return response()->json([
                'project_id' => null,
                'advance' => null,
                'final' => null,
                'renewals' => [],
            ]);
        }

        $payments = Payment::query()
            ->where('project_id', $project->id)
            ->orderByRaw('CASE WHEN due_date IS NULL THEN 1 ELSE 0 END')
            ->orderBy('due_date')
            ->orderBy('id')
            ->get()
            ->map(function (Payment $payment) {
                return [
                    'id' => $payment->id,
                    'project_id' => $payment->project_id,
                    'type' => $payment->type,
                    'amount' => (float) $payment->amount,
                    'status' => $payment->status,
                    'due_date' => optional($payment->due_date)->toDateString(),
                    'is_overdue' => $payment->status === 'pending' && $payment->due_date && $payment->due_date->isPast(),
                    'created_at' => optional($payment->created_at)->toISOString(),
                ];
            })
            ->values();

        return response()->json([
            'project_id' => $project->id,
            'advance' => $payments->firstWhere('type', 'advance'),
            'final' => $payments->firstWhere('type', 'final'),
            'renewals' => $payments->where('type', 'renewal')->values(),
        ]);
    }

    public function services(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role !== 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $client = Client::where('user_id', $apiUser->id)->first();
        if (! $client) {
            return response()->json(['message' => 'Client profile not found'], 404);
        }

        $serviceRows = \DB::table('client_services')
            ->join('services', 'services.id', '=', 'client_services.service_id')
            ->where('client_services.client_id', $client->id)
            ->select('services.id', 'services.name', 'services.price', 'client_services.status')
            ->get();

        if ($serviceRows->isEmpty()) {
            $serviceNames = collect(explode(',', (string) ($client->service_type ?? 'Website Development')))
                ->map(fn ($item) => trim($item))
                ->filter()
                ->values();

            if ($serviceNames->isEmpty()) {
                $serviceNames = collect(['Website Development']);
            }

            foreach ($serviceNames as $serviceName) {
                $service = Service::firstOrCreate(['name' => $serviceName], ['price' => 0]);
                \DB::table('client_services')->updateOrInsert(
                    ['client_id' => $client->id, 'service_id' => $service->id],
                    ['status' => 'active', 'created_at' => now(), 'updated_at' => now()]
                );
            }

            $serviceRows = \DB::table('client_services')
                ->join('services', 'services.id', '=', 'client_services.service_id')
                ->where('client_services.client_id', $client->id)
                ->select('services.id', 'services.name', 'services.price', 'client_services.status')
                ->get();
        }

        return response()->json(collect($serviceRows)->map(function ($row) {
            return [
                'id' => $row->id,
                'name' => $row->name,
                'status' => $row->status,
                'price' => (float) $row->price,
                'description' => $row->name . ' service delivery in progress',
            ];
        })->values());
    }
}

