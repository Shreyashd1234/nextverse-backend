<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('leads', 'assigned_to')) {
            Schema::table('leads', function (Blueprint $table) {
                $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete()->after('status');
            });
        }

        DB::table('leads')
            ->whereNull('status')
            ->orWhereNotIn('status', ['new', 'in_progress', 'converted'])
            ->update(['status' => 'new']);

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE leads MODIFY status ENUM('new','in_progress','converted') NOT NULL DEFAULT 'new'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'sqlite' && Schema::hasColumn('leads', 'status')) {
            DB::statement("ALTER TABLE leads MODIFY status VARCHAR(255) NOT NULL DEFAULT 'new'");
        }
    }
};
