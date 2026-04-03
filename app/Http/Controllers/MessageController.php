<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->orderBy('name')->get();

        return view('chat.index', [
            'users' => $users,
            'messages' => collect(),
            'selectedUser' => null,
        ]);
    }

    public function show($user_id)
    {
        $users = User::where('id', '!=', auth()->id())->orderBy('name')->get();
        $selectedUser = User::findOrFail($user_id);

        $messages = Message::where(function ($query) use ($user_id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $user_id);
        })->orWhere(function ($query) use ($user_id) {
            $query->where('sender_id', $user_id)
                ->where('receiver_id', auth()->id());
        })->orderBy('created_at')->get();

        return view('chat.index', [
            'users' => $users,
            'messages' => $messages,
            'selectedUser' => $selectedUser,
        ]);
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => ['required', 'integer', 'exists:users,id'],
            'message' => ['required', 'string'],
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $validated['receiver_id'],
            'message' => $validated['message'],
        ]);

        return redirect('/chat/' . $validated['receiver_id']);
    }

    public function apiUsers(Request $request)
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if ($user->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $query = User::query()->where('id', '!=', $user->id);

        if ($user->role === 'growth') {
            $assignedClientUserIds = Client::where('assigned_growth_id', $user->id)
                ->whereNotNull('user_id')
                ->pluck('user_id')
                ->toArray();

            $query->where(function ($builder) use ($assignedClientUserIds) {
                $builder->where('role', 'admin');
                if (! empty($assignedClientUserIds)) {
                    $builder->orWhereIn('id', $assignedClientUserIds);
                }
            });
        }

        $users = $query->orderBy('name')->get(['id', 'name', 'email', 'role']);

        return response()->json($users);
    }

    public function apiMessages(Request $request, $userId)
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if ($user->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        if ($user->role === 'growth') {
            $assignedClientUserIds = Client::where('assigned_growth_id', $user->id)
                ->whereNotNull('user_id')
                ->pluck('user_id')
                ->toArray();

            $allowedUserIds = array_values(array_unique(array_merge(
                User::where('role', 'admin')->pluck('id')->toArray(),
                $assignedClientUserIds
            )));

            if (! in_array((int) $userId, array_map('intval', $allowedUserIds), true)) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
        }

        $messages = Message::where(function ($query) use ($userId, $user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($userId, $user) {
            $query->where('sender_id', $userId)
                ->where('receiver_id', $user->id);
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

    public function apiSend(Request $request)
    {
        $user = $request->user();

        if (! $user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if ($user->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'receiver_id' => ['required', 'integer', 'exists:users,id'],
            'message' => ['required', 'string'],
        ]);

        if ($user->role === 'growth') {
            $assignedClientUserIds = Client::where('assigned_growth_id', $user->id)
                ->whereNotNull('user_id')
                ->pluck('user_id')
                ->toArray();

            $allowedUserIds = array_values(array_unique(array_merge(
                User::where('role', 'admin')->pluck('id')->toArray(),
                $assignedClientUserIds
            )));

            if (! in_array((int) $validated['receiver_id'], array_map('intval', $allowedUserIds), true)) {
                return response()->json(['message' => 'Forbidden'], 403);
            }
        }

        $message = Message::create([
            'sender_id' => $user->id,
            'receiver_id' => $validated['receiver_id'],
            'message' => $validated['message'],
        ]);

        return response()->json($message, 201);
    }
}

