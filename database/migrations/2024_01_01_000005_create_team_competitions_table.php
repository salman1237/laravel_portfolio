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
        Schema::create('team_competitions', function (Blueprint $table) {
            $table->id();
            $table->string('competition_name'); // e.g., "ICPC Dhaka Regional", "NCPC"
            $table->integer('year');
            $table->string('team_name')->nullable();
            $table->string('rank')->nullable(); // e.g., "15th", "Finalist"
            $table->string('award')->nullable(); // e.g., "Honorable Mention"
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_competitions');
    }
};
