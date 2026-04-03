<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Note;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class GrowthController extends Controller
{
    public function dashboard(Request $request)
    {
        try {
            $apiUser = $request->user();
            if (! $apiUser || ! in_array($apiUser->role, ['growth', 'admin'], true)) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            $leads = Lead::query();
            $clients = Client::query();
            $meetings = Meeting::query();
            $projects = Project::query();
            $notes = Note::query();

            if ($apiUser->role === 'growth') {
                $leads->where('assigned_to', $apiUser->id);
                $clients->where('assigned_growth_id', $apiUser->id);
                $meetings->where('user_id', $apiUser->id);
                $projects->where(function ($builder) use ($apiUser) {
                    $builder->where('growth_id', $apiUser->id)
                        ->orWhere('growth_user_id', $apiUser->id);
                });
                $notes->where(function ($builder) use ($apiUser) {
                    $builder->where('user_id', $apiUser->id)
                        ->orWhere('growth_user_id', $apiUser->id);
                });
            }

            $projectSnapshot = (clone $projects)
                ->with(['client:id,client_code,assigned_growth_id'])
                ->orderByDesc('id')
                ->limit(8)
                ->get();

            $clientSnapshot = (clone $clients)
                ->orderByDesc('id')
                ->limit(8)
                ->get(['id', 'client_code', 'service_type', 'assigned_growth_id', 'created_at']);

            return response()->json([
                'stats' => [
                    'assigned_leads' => (int) $leads->count(),
                    'assigned_clients' => (int) $clients->count(),
                    'meetings' => (int) $meetings->count(),
                    'projects' => (int) $projects->count(),
                ],
                'upcoming_meetings' => $meetings->where('scheduled_at', '>=', now())
                    ->orderBy('scheduled_at')
                    ->limit(8)
                    ->get(),
                'my_clients' => $clientSnapshot,
                'my_projects' => $projectSnapshot,
                'notes' => $notes->orderByDesc('id')->limit(12)->get(),
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => 'Failed to load growth dashboard',
                'stats' => [
                    'assigned_leads' => 0,
                    'assigned_clients' => 0,
                    'meetings' => 0,
                    'projects' => 0,
                ],
                'upcoming_meetings' => [],
                'my_clients' => [],
                'my_projects' => [],
                'notes' => [],
            ], 500);
        }
    }

    public function projects(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || ! in_array($apiUser->role, ['growth', 'admin'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $projects = Project::query();
        $leads = Lead::query();
        $meetings = Meeting::query();

        if ($apiUser->role === 'growth') {
            $projects->where('growth_user_id', $apiUser->id);
            $leads->where('assigned_to', $apiUser->id);
            $meetings->where('user_id', $apiUser->id);
        }

        return response()->json([
            'projects' => $projects->orderByDesc('id')->get(),
            'assigned_leads' => $leads->orderByDesc('id')->get(),
            'meetings' => $meetings->orderByDesc('scheduled_at')->get(),
        ]);
    }
}

