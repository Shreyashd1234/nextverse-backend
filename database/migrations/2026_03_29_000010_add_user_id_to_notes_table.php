<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            if (! Schema::hasColumn('notes', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id')->constrained('users')->cascadeOnDelete();
            }
        });

        if (Schema::hasColumn('notes', 'growth_user_id')) {
            DB::statement('UPDATE notes SET user_id = growth_user_id WHERE user_id IS NULL');
        }
    }

    public function down(): void
    {
        Schema::table('notes', function (Blueprint $table) {
            if (Schema::hasColumn('notes', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
        });
    }
};
