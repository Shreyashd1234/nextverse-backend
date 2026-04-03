<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conversation;
use App\Models\ConversationParticipant;
use App\Models\Lead;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderByDesc('id')->get();

        return view('leads.index', ['leads' => $leads]);
    }

    public function create()
    {
        $users = \App\Models\User::all();

        return view('leads.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'service_type' => ['required', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        Lead::create([
            'business_name' => $validated['business_name'],
            'contact_name' => $validated['contact_name'],
            'phone' => $validated['phone'],
            'service_type' => $validated['service_type'],
            'status' => $validated['status'] ?? 'new',
            'assigned_to' => $validated['assigned_to'] ?? null,
            'created_by' => auth()->id(),
        ]);

        return redirect('/leads');
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        $users = \App\Models\User::all();

        return view('leads.edit', ['lead' => $lead, 'users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'service_type' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $lead->update([
            'business_name' => $validated['business_name'],
            'contact_name' => $validated['contact_name'],
            'phone' => $validated['phone'],
            'service_type' => $validated['service_type'],
            'status' => $validated['status'],
            'assigned_to' => $validated['assigned_to'] ?? null,
        ]);

        return redirect('/leads');
    }

    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect('/leads');
    }

    public function convert($id)
    {
        $lead = Lead::findOrFail($id);

        if ($lead->is_converted) {
            return redirect('/clients')->withErrors(['message' => 'Lead already converted']);
        }

        $approver = auth()->user() ?: User::where('role', 'admin')->first();
        if (! $approver instanceof User) {
            return redirect('/leads')->withErrors(['message' => 'No approver user found']);
        }

        try {
            $result = $this->convertLeadToClient($lead, $approver);

            return redirect('/clients')->with([
                'success' => 'Lead converted successfully',
                'client_code' => $result['client_code'],
            ]);
        } catch (\Exception $e) {
            return redirect('/leads')->withErrors(['message' => 'Conversion failed: ' . $e->getMessage()]);
        }
    }

    public function apiIndex()
    {
        $apiUser = request()->user();
        $query = Lead::query();

        if ($apiUser && $apiUser->role === 'growth') {
            $query->where('assigned_to', $apiUser->id);
        }

        if ($apiUser && $apiUser->role === 'client') {
            $client = Client::where('user_id', $apiUser->id)->first();
            if ($client) {
                $query->where('id', $client->lead_id);
            } else {
                $query->whereRaw('1=0');
            }
        }

        $leads = $query->orderByDesc('id')->get();

        return response()->json($leads);
    }

    public function apiStore(Request $request)
    {
        $user = $request->user();
        if (! $user || $user->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'service_type' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $lead = Lead::create([
            'business_name' => $validated['business_name'],
            'contact_name' => $validated['contact_name'],
            'phone' => $validated['phone'],
            'service_type' => $validated['service_type'] ?? 'General',
            'status' => $validated['status'] ?? 'new',
            'assigned_to' => $validated['assigned_to'] ?? null,
            'created_by' => $user->id,
        ]);

        return response()->json($lead, 201);
    }

    public function apiUpdate(Request $request, $id)
    {
        $apiUser = $request->user();
        if (! $apiUser || $apiUser->role === 'client') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $lead = Lead::findOrFail($id);

        if ($apiUser->role === 'growth' && (int) $lead->assigned_to !== (int) $apiUser->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $validated = $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'contact_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'service_type' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
        ]);

        $lead->update([
            'business_name' => $validated['business_name'],
            'contact_name' => $validated['contact_name'],
            'phone' => $validated['phone'],
            'service_type' => $validated['service_type'] ?? $lead->service_type,
            'status' => $validated['status'],
            'assigned_to' => $validated['assigned_to'] ?? null,
        ]);

        return response()->json($lead->fresh());
    }

    public function apiDestroy($id)
    {
        $apiUser = request()->user();
        if (! $apiUser || $apiUser->role !== 'admin') {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $lead = Lead::findOrFail($id);
        $lead->delete();

        return response()->json(['message' => 'Lead deleted']);
    }

    public function apiConvert(Request $request, $id)
    {
        $apiUser = $request->user();
        if (! $apiUser || ! in_array($apiUser->role, ['admin', 'growth'], true)) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $lead = Lead::findOrFail($id);

        if ($apiUser->role === 'growth' && (int) $lead->assigned_to !== (int) $apiUser->id) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        if ($lead->is_converted) {
            return response()->json([
                'message' => 'Lead already converted',
            ], 400);
        }

        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
            'unique_code' => ['nullable', 'string', 'max:255'],
        ]);

        try {
            $result = $this->convertLeadToClient($lead, $apiUser, $validated);

            return response()->json([
                'message' => 'Lead converted successfully',
                'client_code' => $result['client_code'],
                'project_id' => $result['project']->id,
                'conversation_id' => $result['conversation']->id,
                'client' => $result['client'],
                'project' => $result['project'],
                'conversation' => $result['conversation'],
                'client_user' => [
                    'id' => $result['clientUser']->id,
                    'name' => $result['clientUser']->name,
                    'email' => $result['clientUser']->email,
                    'unique_code' => $result['clientUser']->unique_code,
                    'generated_password' => $result['generatedPassword'],
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Client already exists or conversion failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function convertLeadToClient(Lead $lead, User $approvedBy, array $input = []): array
    {
        return DB::transaction(function () use ($lead, $approvedBy, $input) {
            $assignedGrowthId = null;
            if ($approvedBy->role === 'growth') {
                $assignedGrowthId = (int) $approvedBy->id;
            } elseif ($lead->assigned_to) {
                $assignedGrowthId = (int) $lead->assigned_to;
            } else {
                $fallbackGrowthId = User::where('role', 'growth')->value('id');
                if ($fallbackGrowthId) {
                    $assignedGrowthId = (int) $fallbackGrowthId;
                }
            }

            if ($assignedGrowthId) {
                $lead->assigned_to = $assignedGrowthId;
                if ($lead->status !== 'in_progress') {
                    $lead->status = 'in_progress';
                }
                $lead->save();
            }

            $generatedPassword = $input['password'] ?? Str::password(12, letters: true, numbers: true, symbols: true);
            $email = $input['email'] ?? $this->generateClientEmail($lead);
            $uniqueCode = $input['unique_code'] ?? ('CL' . Str::upper(Str::random(6)));
            $name = $input['name'] ?? $lead->contact_name;

            $clientUser = User::where('email', $email)->first();
            if (! $clientUser) {
                $clientUser = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::make($generatedPassword),
                    'unique_code' => $uniqueCode,
                    'role' => 'client',
                    'is_active' => true,
                ]);
            }

            $client = Client::where('lead_id', $lead->id)->first();
            if (! $client) {
                $clientCode = $this->generateUniqueClientCode();

                $client = Client::create([
                    'client_code' => $clientCode,
                    'lead_id' => $lead->id,
                    'user_id' => $clientUser->id,
                    'assigned_growth_id' => $assignedGrowthId,
                    'service_type' => $lead->service_type,
                    'stage' => 'converted',
                ]);
            } else {
                $client->update([
                    'user_id' => $clientUser->id,
                    'assigned_growth_id' => $assignedGrowthId,
                    'service_type' => $lead->service_type,
                    'stage' => 'converted',
                ]);
            }

            $lead->update([
                'status' => 'converted',
                'is_converted' => true,
            ]);

            $project = Project::firstOrCreate(
                ['client_id' => $client->id],
                [
                    'lead_id' => $lead->id,
                    'admin_id' => $approvedBy->id,
                    'growth_id' => $assignedGrowthId,
                    'growth_user_id' => $assignedGrowthId,
                    'name' => $lead->business_name . ' Project',
                    'description' => 'Auto-created during lead conversion',
                    'progress' => 0,
                    'status_label' => 'Planning',
                    'is_live' => true,
                    'downtime_reason' => null,
                    'last_updated_at' => now(),
                    'status' => 'ongoing',
                ]
            );

            $project->update([
                'growth_id' => $assignedGrowthId,
                'growth_user_id' => $assignedGrowthId,
                'last_updated_at' => now(),
                'status' => in_array($project->status, ['ongoing', 'completed'], true) ? $project->status : 'ongoing',
            ]);

            if ($project->tasks()->count() === 0) {
                ProjectTask::create([
                    'project_id' => $project->id,
                    'title' => 'Kickoff call completed',
                    'status' => 'done',
                    'completed_at' => now(),
                ]);

                ProjectTask::create([
                    'project_id' => $project->id,
                    'title' => 'Requirements finalized',
                    'status' => 'pending',
                ]);

                ProjectTask::create([
                    'project_id' => $project->id,
                    'title' => 'Implementation milestone 1',
                    'status' => 'pending',
                ]);
            }

            Payment::firstOrCreate([
                'project_id' => $project->id,
                'type' => 'advance',
            ], [
                'client_id' => $client->id,
                'amount' => 0,
                'status' => 'pending',
                'due_date' => now()->addDays(7)->toDateString(),
            ]);

            Payment::firstOrCreate([
                'project_id' => $project->id,
                'type' => 'final',
            ], [
                'client_id' => $client->id,
                'amount' => 0,
                'status' => 'pending',
                'due_date' => now()->addDays(45)->toDateString(),
            ]);

            Payment::firstOrCreate([
                'project_id' => $project->id,
                'type' => 'renewal',
                'due_date' => now()->addMonths(12)->toDateString(),
            ], [
                'client_id' => $client->id,
                'amount' => 0,
                'status' => 'pending',
            ]);

            $serviceNames = collect(explode(',', (string) ($lead->service_type ?? 'Website Development')))
                ->map(fn ($item) => trim($item))
                ->filter()
                ->values();

            if ($serviceNames->isEmpty()) {
                $serviceNames = collect(['Website Development']);
            }

            foreach ($serviceNames as $serviceName) {
                $service = Service::firstOrCreate(['name' => $serviceName], ['price' => 0]);

                DB::table('client_services')->updateOrInsert(
                    ['client_id' => $client->id, 'service_id' => $service->id],
                    ['status' => 'active', 'created_at' => now(), 'updated_at' => now()]
                );
            }

            $conversation = Conversation::firstOrCreate(
                ['project_id' => $project->id, 'type' => 'group'],
                [
                    'name' => 'Nextverse Team - ' . $lead->business_name,
                    'client_id' => $client->id,
                    'project_id' => $project->id,
                    'created_by' => $approvedBy->id,
                ]
            );

            $conversation->update([
                'client_id' => $client->id,
                'project_id' => $project->id,
                'name' => $conversation->name ?: ('Nextverse Team - ' . $lead->business_name),
            ]);

            $adminUsers = User::where('role', 'admin')->orderBy('id')->limit(1)->pluck('id')->toArray();
            $participantIds = array_values(array_unique(array_filter(array_merge(
                [$clientUser->id, $assignedGrowthId],
                $adminUsers
            ))));

            $this->ensureConversationParticipants($conversation->id, $participantIds);

            // Create welcome message from admin/growth user
            $senderUser = $approvedBy->role === 'admin' ? $approvedBy : User::where('role', 'admin')->first();
            if (! $senderUser) {
                $senderUser = $approvedBy;
            }

            Message::create([
                'conversation_id' => $conversation->id,
                'sender_id' => $senderUser->id,
                'message' => "Welcome! Your project has been started. We're excited to work with you. Feel free to reach out anytime with questions.",
                'type' => 'text',
            ]);

            return [
                'client_code' => $client->client_code,
                'clientUser' => $clientUser,
                'client' => $client->fresh(),
                'project' => $project,
                'conversation' => $conversation,
                'generatedPassword' => $input['password'] ?? $generatedPassword,
            ];
        });
    }

    private function ensureConversationParticipants(int $conversationId, array $participantIds): void
    {
        foreach ($participantIds as $participantId) {
            ConversationParticipant::firstOrCreate([
                'conversation_id' => $conversationId,
                'user_id' => $participantId,
            ]);
        }
    }

    private function generateClientEmail(Lead $lead): string
    {
        $base = Str::slug($lead->contact_name ?: $lead->business_name);
        if (! $base) {
            $base = 'client' . $lead->id;
        }

        $candidate = $base . '@nextverse.app';
        $counter = 1;

        while (User::where('email', $candidate)->exists()) {
            $candidate = $base . $counter . '@nextverse.app';
            $counter++;
        }

        return $candidate;
    }

    private function generateUniqueClientCode(): string
    {
        $lastClient = Client::orderByDesc('id')->first();
        $nextNumber = 1;

        if ($lastClient) {
            $nextNumber = (int) substr($lastClient->client_code, 3) + 1;
        }

        $maxAttempts = 100;
        $attempt = 0;

        while ($attempt < $maxAttempts) {
            $clientCode = 'NXC' . str_pad((string) $nextNumber, 3, '0', STR_PAD_LEFT);

            if (! Client::where('client_code', $clientCode)->exists()) {
                return $clientCode;
            }

            $nextNumber++;
            $attempt++;
        }

        throw new \Exception('Unable to generate unique client code after ' . $maxAttempts . ' attempts');
    }
}


