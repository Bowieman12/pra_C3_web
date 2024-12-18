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
        Schema::table('games', function (Blueprint $table) {
            $table->integer('team_1_score')->default(0);
            $table->integer('team_2_score')->default(0);
            $table->unsignedBigInteger('team_1')->nullable()->change();
            $table->unsignedBigInteger('team_2')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['team_1_score', 'team_2_score']);
            $table->unsignedBigInteger('team_1')->nullable(false)->change();
            $table->unsignedBigInteger('team_2')->nullable(false)->change();
        });
    }
};
