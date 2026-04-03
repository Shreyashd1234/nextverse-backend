<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\Message;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        $apiUser = $request->user();
        if (! $apiUser) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $query = Conversation::query();

        if ($apiUser->role === 'admin') {
            // Admin can see all conversations.
        } elseif (in_array($apiUser->role, ['growth', 'client'], true)) {
            $query->whereIn('id', function ($subquery) use ($apiUser) {
                $subquery->select('conversation_id')
                    ->from('conversation_participants')
                    ->where('user_id', $apiUser->id);
            });
        } else {
            return response()->json([], 200);
        }

        $conversations = $query
            ->where('type', 'group')
            ->orderByDesc('updated_at')
            ->distinct('conversations.id')
            ->get();

        return response()->json($conversations);
    }

    public function messages(Request $request, $conversationId)
    {
        $apiUser = $request->user();
        if (! $apiUser) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $conversation = Conversation::findOrFail($conversationId);

        if (! $this->canAccessConversation($apiUser, $conversation)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $messages = Message::where('conversation_id', $conversationId)
            ->with('sender:id,name,role')
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    public function send(Request $request, $conversationId = null)
    {
        $apiUser = $request->user();
        if (! $apiUser) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        $validated = $request->validate([
            'conversation_id' => ['nullable', 'integer', 'exists:conversations,id'],
            'message' => ['required', 'string'],
            'type' => ['nullable', 'in:text,link,mom_pdf'],
            'url' => ['nullable', 'url'],
            'title' => ['nullable', 'string', 'max:255'],
        ]);

        $resolvedConversationId = $conversationId ? (int) $conversationId : (int) ($validated['conversation_id'] ?? 0);
        if (! $resolvedConversationId) {
            return response()->json(['message' => 'conversation_id is required'], 422);
        }

        $conversation = Conversation::findOrFail($resolvedConversationId);

        if (! $this->canAccessConversation($apiUser, $conversation)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $type = $validated['type'] ?? 'text';
        $payloadMessage = $validated['message'];

        if ($type === 'mom_pdf') {
            $payloadMessage = json_encode([
                'title' => $validated['title'] ?? 'Minutes of Meeting',
                'url' => $validated['url'] ?? '',
            ], JSON_UNESCAPED_SLASHES);
        }

        if ($type === 'link' && ! empty($validated['url'])) {
            $payloadMessage = $validated['url'];
        }

        $message = Message::create([
            'conversation_id' => $resolvedConversationId,
            'sender_id' => $apiUser->id,
            'receiver_id' => null,
            'message' => $payloadMessage,
            'type' => $type,
        ]);

        $conversation->touch();

        return response()->json($message->fresh(['sender:id,name,role']), 201);
    }

    private function canAccessConversation($apiUser, Conversation $conversation): bool
    {
        if ($apiUser->role === 'admin') {
            return true;
        }

        if ($apiUser->role === 'growth' && ! ConversationParticipant::where('conversation_id', $conversation->id)
            ->where('user_id', $apiUser->id)
            ->exists()) {
            return false;
        }

        return ConversationParticipant::where('conversation_id', $conversation->id)
            ->where('user_id', $apiUser->id)
            ->exists();
    }
}

