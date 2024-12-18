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
            $table->unsignedBigInteger('team_1');
            $table->unsignedBigInteger('team_2');

            // Voeg foreign keys toe als dat nodig is
            $table->foreign('team_1')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team_2')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign(['team_1']);
            $table->dropForeign(['team_2']);
            $table->dropColumn(['team_1', 'team_2']);
        });
    }
};
