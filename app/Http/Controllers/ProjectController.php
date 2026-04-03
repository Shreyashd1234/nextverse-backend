<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $query = Project::query()->with(['client:id,client_code,user_id,assigned_growth_id,service_type,stage']);

        if ($user->role === 'client') {
            $query->whereHas('client', function ($builder) use ($user) {
                $builder->where('user_id', $user->id);
            });
        } elseif ($user->role === 'growth') {
            $query->where(function ($builder) use ($user) {
                $builder->where('growth_id', $user->id)
                    ->orWhere('growth_user_id', $user->id);
            });
        }

        $projects = $query->orderByDesc('id')->get();

        return response()->json($projects);
    }

    public function show(Request $request, int $id)
    {
        $user = $request->user();
        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $query = Project::query()->with(['client:id,client_code,user_id,assigned_growth_id,service_type,stage']);

        if ($user->role === 'client') {
            $query->whereHas('client', function ($builder) use ($user) {
                $builder->where('user_id', $user->id);
            });
        } elseif ($user->role === 'growth') {
            $query->where(function ($builder) use ($user) {
                $builder->where('growth_id', $user->id)
                    ->orWhere('growth_user_id', $user->id);
            });
        }

        $project = $query->findOrFail($id);

        return response()->json($project);
    }

    public function update(Request $request, int $id)
    {
        $user = $request->user();
        if (! $user || ! in_array($user->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $project = Project::with('client')->findOrFail($id);

        if ($user->role === 'growth' && (int) ($project->growth_id ?? $project->growth_user_id) !== (int) $user->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'progress' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'status' => ['sometimes', 'in:ongoing,completed'],
            'growth_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
        ]);

        if ($user->role === 'growth') {
            unset($validated['growth_id']);
        }

        if (array_key_exists('growth_id', $validated)) {
            $project->growth_id = $validated['growth_id'];
            $project->growth_user_id = $validated['growth_id'];
            if ($project->client) {
                $project->client->update(['assigned_growth_id' => $validated['growth_id']]);
            }
        }

        if (array_key_exists('name', $validated)) {
            $project->name = $validated['name'];
        }

        if (array_key_exists('progress', $validated)) {
            $project->progress = $validated['progress'];
        }

        if (array_key_exists('status', $validated)) {
            $project->status = $validated['status'];
        }

        $project->save();

        return response()->json($project->fresh(['client:id,client_code,user_id,assigned_growth_id,service_type,stage']));
    }
}
