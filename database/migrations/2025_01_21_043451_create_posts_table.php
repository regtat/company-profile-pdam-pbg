<?php

use App\Models\User;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('body');
            $table->datetime('published_at');
            $table->foreignIdFor(User::class, 'user_id');
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->boolean('active')->nullable()->default(false);
            $table->boolean('comments_enabled')->nullable()->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
