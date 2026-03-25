<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('leaderboards', function (Blueprint $table) {
            $table->id();
            $table->string('participant_name');
            $table->string('image_path')->nullable();
            $table->enum('category', ['top_monthly', 'top_fade', 'best_story']);
            $table->string('month_label')->nullable(); // e.g. "Maret 2026"
            $table->integer('rank')->default(0);
            $table->string('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leaderboards');
    }
};
