<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderByDesc('id')->get();

        return view('clients.index', ['clients' => $clients]);
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);

        return view('clients.show', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'price' => ['nullable', 'numeric'],
            'timeline' => ['nullable', 'string', 'max:255'],
        ]);

        $client->update([
            'price' => $validated['price'] ?? $client->price,
            'timeline' => $validated['timeline'] ?? $client->timeline,
        ]);

        return redirect("/clients/{$id}");
    }

    public function apiIndex()
    {
        $apiUser = request()->user();
        $query = Client::query();

        if ($apiUser && $apiUser->role === 'growth') {
            $query->where('assigned_growth_id', $apiUser->id);
        }

        if ($apiUser && $apiUser->role === 'client') {
            $query->where('user_id', $apiUser->id);
        }

        $clients = $query->orderByDesc('id')->get();

        return response()->json($clients);
    }
}

