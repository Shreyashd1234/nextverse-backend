<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $user = $request->user();
        if (! $user || ! in_array($user->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $query = Payment::query()->with(['project:id,name,client_id', 'project.client:id,client_code,assigned_growth_id']);

        if ($user->role === 'growth') {
            $query->whereHas('project', function ($builder) use ($user) {
                $builder->where('growth_id', $user->id)
                    ->orWhere('growth_user_id', $user->id)
                    ->orWhereHas('client', function ($clientBuilder) use ($user) {
                        $clientBuilder->where('assigned_growth_id', $user->id);
                    });
            });
        }

        if ($request->filled('project_id')) {
            $query->where('project_id', (int) $request->integer('project_id'));
        }

        $payments = $query->orderByDesc('id')->get();

        return response()->json($payments);
    }

    public function store(Request $request): JsonResponse
    {
        $user = $request->user();
        if (! $user || ! in_array($user->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'type' => ['required', 'in:advance,final,renewal'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['nullable', 'in:pending,paid'],
            'due_date' => ['nullable', 'date'],
        ]);

        $project = Project::query()->with('client:id,assigned_growth_id')->findOrFail((int) $validated['project_id']);

        if (! $this->canManageProject($user, $project)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $payment = Payment::create([
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'status' => $validated['status'] ?? 'pending',
            'due_date' => $validated['due_date'] ?? null,
        ]);

        return response()->json($payment->fresh(['project:id,name,client_id', 'project.client:id,client_code']), 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $user = $request->user();
        if (! $user || ! in_array($user->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $payment = Payment::query()->with('project.client:id,assigned_growth_id')->findOrFail($id);

        if (! $payment->project || ! $this->canManageProject($user, $payment->project)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'status' => ['required', 'in:pending,paid'],
        ]);

        $payment->status = $validated['status'];
        $payment->save();

        return response()->json($payment->fresh(['project:id,name,client_id', 'project.client:id,client_code']));
    }

    private function canManageProject($user, Project $project): bool
    {
        if ($user->role === 'admin') {
            return true;
        }

        return (int) $project->growth_id === (int) $user->id
            || (int) $project->growth_user_id === (int) $user->id
            || (int) ($project->client->assigned_growth_id ?? 0) === (int) $user->id;
    }
}
