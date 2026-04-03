<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('conversation_participants')) {
            Schema::create('conversation_participants', function (Blueprint $table) {
                $table->id();
                $table->foreignId('conversation_id')->constrained('conversations')->cascadeOnDelete();
                $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
                $table->timestamps();

                $table->unique(['conversation_id', 'user_id']);
            });
        }

        if (Schema::hasTable('conversation_users')) {
            $rows = DB::table('conversation_users')
                ->select('conversation_id', 'user_id')
                ->get();

            foreach ($rows as $row) {
                DB::table('conversation_participants')->updateOrInsert(
                    [
                        'conversation_id' => $row->conversation_id,
                        'user_id' => $row->user_id,
                    ],
                    [
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('conversation_participants');
    }
};
