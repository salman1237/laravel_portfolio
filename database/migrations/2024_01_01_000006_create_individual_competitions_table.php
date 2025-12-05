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
        Schema::create('individual_competitions', function (Blueprint $table) {
            $table->id();
            $table->string('platform'); // e.g., "Codeforces", "LeetCode", "CodeChef"
            $table->integer('rating')->nullable();
            $table->integer('max_rating')->nullable();
            $table->integer('problems_solved')->nullable();
            $table->string('rank')->nullable(); // e.g., "Expert", "Specialist"
            $table->string('profile_url')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('individual_competitions');
    }
};
