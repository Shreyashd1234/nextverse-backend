<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Lead;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::query()->updateOrCreate([
            'email' => 'admin@nextverse.com',
        ], [
            'name' => 'Nextverse Admin',
            'password' => 'Admin@123',
            'unique_code' => 'ADMIN-NEXTVERSE',
            'role' => 'admin',
            'is_active' => true,
        ]);

        $growth = User::query()->updateOrCreate([
            'email' => 'growth@nextverse.com',
        ], [
            'name' => 'Nextverse Growth',
            'password' => 'Growth@123',
            'unique_code' => 'GROWTH-NEXTVERSE',
            'role' => 'growth',
            'is_active' => true,
        ]);

        $clientUser = User::query()->updateOrCreate([
            'email' => 'client@nextverse.com',
        ], [
            'name' => 'Nextverse Client',
            'password' => 'Client@123',
            'unique_code' => 'CLIENT-NEXTVERSE',
            'role' => 'client',
            'is_active' => true,
        ]);

        $lead = Lead::query()->updateOrCreate([
            'business_name' => 'Nextverse Demo Client',
        ], [
            'contact_name' => 'Client Contact',
            'phone' => '+1000000000',
            'service_type' => 'Web Development',
            'status' => 'converted',
            'assigned_to' => $growth->id,
            'created_by' => $admin->id,
        ]);

        $client = Client::query()->updateOrCreate([
            'lead_id' => $lead->id,
        ], [
            'client_code' => 'NV-CLIENT-DEMO',
            'user_id' => $clientUser->id,
            'assigned_growth_id' => $growth->id,
            'service_type' => 'Web Development',
            'price' => 2500,
            'timeline' => '8 weeks',
            'stage' => 'active',
        ]);

        Project::query()->updateOrCreate([
            'client_id' => $client->id,
            'name' => 'Nextverse Transparency Demo',
        ], [
            'lead_id' => $lead->id,
            'admin_id' => $admin->id,
            'growth_user_id' => $growth->id,
            'growth_id' => $growth->id,
            'description' => 'Seeded demo project for transparency dashboard.',
            'progress' => 42,
            'status' => 'ongoing',
            'status_label' => 'In Development',
            'is_live' => true,
            'downtime_reason' => null,
            'last_updated_at' => now(),
        ]);
    }
}
