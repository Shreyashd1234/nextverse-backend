<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('projects', 'growth_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->foreignId('growth_id')->nullable()->constrained('users')->nullOnDelete()->after('client_id');
            });
        }

        DB::table('projects')
            ->whereNull('growth_id')
            ->whereNotNull('growth_user_id')
            ->update(['growth_id' => DB::raw('growth_user_id')]);

        DB::table('projects')
            ->whereNull('status')
            ->orWhereNotIn('status', ['ongoing', 'completed'])
            ->update(['status' => 'ongoing']);

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE projects MODIFY status ENUM('ongoing','completed') NOT NULL DEFAULT 'ongoing'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'sqlite' && Schema::hasColumn('projects', 'status')) {
            DB::statement("ALTER TABLE projects MODIFY status VARCHAR(255) NOT NULL DEFAULT 'active'");
        }
    }
};
