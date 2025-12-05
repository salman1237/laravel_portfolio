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
        Schema::create('online_judges', function (Blueprint $table) {
            $table->id();
            $table->string('platform_name'); // e.g., "LightOJ", "Vjudge", "UVa"
            $table->string('username');
            $table->integer('rating')->nullable();
            $table->integer('problems_solved')->nullable();
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
        Schema::dropIfExists('online_judges');
    }
};
