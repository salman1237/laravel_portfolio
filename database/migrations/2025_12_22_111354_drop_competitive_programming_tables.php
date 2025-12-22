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
        Schema::dropIfExists('team_competitions');
        Schema::dropIfExists('individual_competitions');
        Schema::dropIfExists('online_judges');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Recreate tables if needed for rollback
        Schema::create('team_competitions', function (Blueprint $table) {
            $table->id();
            $table->string('competition_name');
            $table->string('team_name')->nullable();
            $table->year('year');
            $table->integer('rank')->nullable();
            $table->string('award')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('individual_competitions', function (Blueprint $table) {
            $table->id();
            $table->string('platform');
            $table->string('rank')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('problems_solved')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('online_judges', function (Blueprint $table) {
            $table->id();
            $table->string('platform_name');
            $table->string('username');
            $table->integer('problems_solved')->nullable();
            $table->string('profile_url')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
};
