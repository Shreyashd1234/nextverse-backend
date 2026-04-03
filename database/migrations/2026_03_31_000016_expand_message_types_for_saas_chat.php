<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('messages', 'type')) {
            return;
        }

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE messages MODIFY type ENUM('text','link','mom_pdf') NOT NULL DEFAULT 'text'");
        }
    }

    public function down(): void
    {
        if (! Schema::hasColumn('messages', 'type')) {
            return;
        }

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE messages MODIFY type ENUM('text','file') NOT NULL DEFAULT 'text'");
        }
    }
};
