<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        try {
            $apiUser = $request->user();
            if (! $apiUser || $apiUser->role !== 'admin') {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            $recentUsers = User::query()
                ->orderByDesc('id')
                ->limit(8)
                ->get(['id', 'name', 'email', 'role', 'is_active']);

            $recentLeads = Lead::query()
                ->orderByDesc('id')
                ->limit(5)
                ->get(['id', 'business_name', 'created_at'])
                ->map(function (Lead $lead) {
                    return [
                        'id' => 'lead-' . $lead->id,
                        'type' => 'lead',
                        'name' => $lead->business_name,
                        'created_at' => $lead->created_at,
                    ];
                });

            $recentClients = Client::query()
                ->orderByDesc('id')
                ->limit(5)
                ->get(['id', 'client_code', 'created_at'])
                ->map(function (Client $client) {
                    return [
                        'id' => 'client-' . $client->id,
                        'type' => 'client',
                        'name' => $client->client_code,
                        'created_at' => $client->created_at,
                    ];
                });

            $recentProjects = $recentLeads
                ->concat($recentClients)
                ->sortByDesc('created_at')
                ->take(8)
                ->values();

            $allProjects = Project::query()
                ->with(['client:id,client_code,assigned_growth_id', 'growthUser:id,name,email'])
                ->orderByDesc('id')
                ->limit(50)
                ->get();

            $allClients = Client::query()
                ->orderByDesc('id')
                ->limit(50)
                ->get(['id', 'client_code', 'assigned_growth_id', 'service_type', 'stage', 'created_at']);

            $growthUsers = User::query()
                ->where('role', 'growth')
                ->orderBy('name')
                ->get(['id', 'name', 'email']);

            return response()->json([
                'stats' => [
                    'leads' => (int) Lead::count(),
                    'clients' => (int) Client::count(),
                    'meetings' => (int) Meeting::count(),
                    'users' => (int) User::count(),
                ],
                'recent_users' => $recentUsers,
                'recent_projects' => $recentProjects,
                'all_projects' => $allProjects,
                'all_clients' => $allClients,
                'growth_users' => $growthUsers,
            ]);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => 'Failed to load admin dashboard',
                'stats' => [
                    'leads' => 0,
                    'clients' => 0,
                    'meetings' => 0,
                    'users' => 0,
                ],
                'recent_users' => [],
                'recent_projects' => [],
                'all_projects' => [],
                'all_clients' => [],
                'growth_users' => [],
            ], 500);
        }
    }

    public function users(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $users = User::query()
            ->orderByDesc('id')
            ->get(['id', 'name', 'email', 'role', 'is_active', 'created_at']);

        return response()->json($users);
    }
}

