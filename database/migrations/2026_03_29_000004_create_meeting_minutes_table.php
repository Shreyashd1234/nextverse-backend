<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meeting_minutes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meeting_id')->constrained('meetings')->cascadeOnDelete();
            $table->foreignId('growth_user_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->text('agenda');
            $table->longText('discussion');
            $table->longText('decisions');
            $table->longText('action_items');
            $table->timestamp('confirmed_at')->nullable();
            $table->string('pdf_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meeting_minutes');
    }
};
