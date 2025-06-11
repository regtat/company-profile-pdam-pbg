<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comment_id')->nullable()->constrained('comments')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); //user yang mengubah komentar, NULL jika dilakukan oleh tamu
            $table->enum('action', ['update', 'delete']);
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();
            $table->timestamp('action_time')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_logs');
    }
};