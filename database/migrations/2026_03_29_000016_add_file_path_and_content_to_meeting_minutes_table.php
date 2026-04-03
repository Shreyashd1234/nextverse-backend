<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('meeting_minutes', function (Blueprint $table) {
            if (! Schema::hasColumn('meeting_minutes', 'content')) {
                $table->longText('content')->nullable()->after('discussion');
            }

            if (! Schema::hasColumn('meeting_minutes', 'file_path')) {
                $table->string('file_path')->nullable()->after('pdf_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('meeting_minutes', function (Blueprint $table) {
            if (Schema::hasColumn('meeting_minutes', 'content')) {
                $table->dropColumn('content');
            }

            if (Schema::hasColumn('meeting_minutes', 'file_path')) {
                $table->dropColumn('file_path');
            }
        });
    }
};
