<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            if (! Schema::hasColumn('messages', 'conversation_id')) {
                $table->foreignId('conversation_id')->nullable()->after('id')->constrained('conversations')->cascadeOnDelete();
            }

            if (! Schema::hasColumn('messages', 'type')) {
                $table->string('type')->default('text')->after('message');
            }
        });

        DB::table('messages')
            ->whereNull('type')
            ->update(['type' => 'text']);

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement("ALTER TABLE messages MODIFY type ENUM('text','file') NOT NULL DEFAULT 'text'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() !== 'sqlite' && Schema::hasColumn('messages', 'type')) {
            DB::statement("ALTER TABLE messages MODIFY type VARCHAR(255) NOT NULL DEFAULT 'text'");
        }
    }
};
