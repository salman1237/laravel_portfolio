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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->enum('type', ['journal', 'conference', 'book_chapter', 'patent', 'other'])->default('other');
            $table->text('authors');
            $table->string('publication')->nullable();
            $table->date('published_date')->nullable();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
