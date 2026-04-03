<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (! Schema::hasColumn('projects', 'progress')) {
                $table->unsignedInteger('progress')->default(0)->after('description');
            }

            if (! Schema::hasColumn('projects', 'status_label')) {
                $table->string('status_label')->default('Planning')->after('progress');
            }

            if (! Schema::hasColumn('projects', 'is_live')) {
                $table->boolean('is_live')->default(true)->after('status_label');
            }

            if (! Schema::hasColumn('projects', 'downtime_reason')) {
                $table->text('downtime_reason')->nullable()->after('is_live');
            }

            if (! Schema::hasColumn('projects', 'last_updated_at')) {
                $table->timestamp('last_updated_at')->nullable()->after('downtime_reason');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'last_updated_at')) {
                $table->dropColumn('last_updated_at');
            }

            if (Schema::hasColumn('projects', 'downtime_reason')) {
                $table->dropColumn('downtime_reason');
            }

            if (Schema::hasColumn('projects', 'is_live')) {
                $table->dropColumn('is_live');
            }

            if (Schema::hasColumn('projects', 'status_label')) {
                $table->dropColumn('status_label');
            }

        });
    }
};
