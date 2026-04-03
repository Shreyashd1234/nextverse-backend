<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['admin', 'growth', 'client'])->default('client')->after('unique_code');
            });

            return;
        }

        DB::table('users')
            ->whereNull('role')
            ->orWhereNotIn('role', ['admin', 'growth', 'client'])
            ->update(['role' => 'client']);

        // SQLite does not support altering enum columns in-place.
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE users MODIFY role ENUM('admin','growth','client') NOT NULL DEFAULT 'client'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (! Schema::hasColumn('users', 'role')) {
            return;
        }

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE users MODIFY role VARCHAR(255) NOT NULL");
        }
    }
};
