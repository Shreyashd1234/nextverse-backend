<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Lead;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        try {
            $apiUser = $request->user();
            if (! $apiUser || ! in_array($apiUser->role, ['admin', 'growth'], true)) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            $query = Note::query();

            if ($apiUser->role === 'growth') {
                $query->where(function ($builder) use ($apiUser) {
                    $builder->where('user_id', $apiUser->id)
                        ->orWhere('growth_user_id', $apiUser->id);
                });
            }

            $notes = $query->orderByDesc('id')->get();

            return response()->json($notes);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => 'Failed to load notes',
                'data' => [],
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $apiUser = $request->user();
            if (! $apiUser || ! in_array($apiUser->role, ['admin', 'growth'], true)) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            $validated = $request->validate([
                'lead_id' => ['nullable', 'integer', 'exists:leads,id'],
                'client_id' => ['nullable', 'integer', 'exists:clients,id'],
                'title' => ['nullable', 'string', 'max:255'],
                'content' => ['required', 'string'],
            ]);

            if ($apiUser->role === 'growth') {
                if (! empty($validated['lead_id'])) {
                    $lead = Lead::findOrFail($validated['lead_id']);
                    if ((int) $lead->assigned_to !== (int) $apiUser->id) {
                        return response()->json(['message' => 'Forbidden'], 403);
                    }
                }

                if (! empty($validated['client_id'])) {
                    $client = Client::findOrFail($validated['client_id']);
                    if ((int) $client->assigned_growth_id !== (int) $apiUser->id) {
                        return response()->json(['message' => 'Forbidden'], 403);
                    }
                }
            }

            $note = Note::create([
                'user_id' => $apiUser->id,
                'growth_user_id' => $apiUser->id,
                'lead_id' => $validated['lead_id'] ?? null,
                'client_id' => $validated['client_id'] ?? null,
                'title' => $validated['title'] ?? 'Internal Note',
                'content' => $validated['content'],
                'visibility' => 'private',
            ]);

            return response()->json($note, 201);
        } catch (\Throwable $exception) {
            return response()->json([
                'message' => 'Failed to create note',
            ], 500);
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $apiUser = $request->user();
            if (! $apiUser || ! in_array($apiUser->role, ['admin', 'growth'], true)) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            $note = Note::findOrFail($id);

            if ($apiUser->role === 'growth' && (int) ($note->user_id ?? $note->growth_user_id) !== (int) $apiUser->id) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            $note->delete();

            return response()->json(['message' => 'Note deleted']);
        } catch (\Throwable $exception) {
            return response()->json(['message' => 'Failed to delete note'], 500);
        }
    }
}

