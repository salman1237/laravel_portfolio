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
        Schema::table('personal_infos', function (Blueprint $table) {
            $table->string('tagline')->nullable()->after('name');
            $table->date('date_of_birth')->nullable()->after('bio');
            $table->string('website')->nullable()->after('github');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_infos', function (Blueprint $table) {
            $table->dropColumn(['tagline', 'date_of_birth', 'website']);
        });
    }
};
