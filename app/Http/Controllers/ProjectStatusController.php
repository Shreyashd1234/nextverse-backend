<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectStatusController extends Controller
{
    public function getClientProjectStatus(Request $request): JsonResponse
    {
        $user = $request->user();
        if (! $user || $user->role !== 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $project = Project::query()
            ->whereHas('client', function ($builder) use ($user) {
                $builder->where('user_id', $user->id);
            })
            ->orderByDesc('id')
            ->first();

        if (! $project) {
            return response()->json([
                'has_project' => false,
                'project_name' => null,
                'progress' => 0,
                'status_label' => 'Planning',
                'is_live' => true,
                'downtime_reason' => null,
                'last_updated_at' => null,
            ]);
        }

        return response()->json([
            'has_project' => true,
            'project_id' => $project->id,
            'project_name' => $project->name,
            'progress' => (int) $project->progress,
            'status_label' => $project->status_label ?: 'Planning',
            'is_live' => (bool) $project->is_live,
            'downtime_reason' => $project->downtime_reason,
            'last_updated_at' => optional($project->last_updated_at)->toISOString(),
        ]);
    }

    public function updateProjectStatus(Request $request, int $id): JsonResponse
    {
        $user = $request->user();
        if (! $user || ! in_array($user->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $project = Project::query()->with('client:id,assigned_growth_id')->findOrFail($id);

        if ($user->role === 'growth') {
            $isAssignedGrowth = (int) $project->growth_id === (int) $user->id
                || (int) $project->growth_user_id === (int) $user->id
                || (int) ($project->client->assigned_growth_id ?? 0) === (int) $user->id;

            if (! $isAssignedGrowth) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
        }

        $validated = $request->validate([
            'progress' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'status_label' => ['sometimes', 'string', 'max:100'],
            'is_live' => ['sometimes', 'boolean'],
            'downtime_reason' => ['sometimes', 'nullable', 'string', 'max:5000'],
        ]);

        if (array_key_exists('progress', $validated)) {
            $project->progress = (int) $validated['progress'];
        }

        if (array_key_exists('is_live', $validated)) {
            $project->is_live = (bool) $validated['is_live'];

            if ($project->is_live && ! array_key_exists('downtime_reason', $validated)) {
                $project->downtime_reason = null;
            }
        }

        if (array_key_exists('downtime_reason', $validated)) {
            $project->downtime_reason = $validated['downtime_reason'];
        }

        if (array_key_exists('status_label', $validated)) {
            $project->status_label = $validated['status_label'];
        }

        $project->last_updated_at = now();

        $project->save();

        return response()->json([
            'message' => 'Project status updated successfully.',
            'data' => [
                'has_project' => true,
                'project_id' => $project->id,
                'project_name' => $project->name,
                'progress' => (int) $project->progress,
                'status_label' => $project->status_label,
                'is_live' => (bool) $project->is_live,
                'downtime_reason' => $project->downtime_reason,
                'last_updated_at' => optional($project->last_updated_at)->toISOString(),
            ],
        ]);
    }
}
