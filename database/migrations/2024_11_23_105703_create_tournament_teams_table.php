<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tournament_teams', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('tournament_id')->constrained('tournaments')->cascadeOnDelete(); // FK to tournaments
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete(); // FK to teams
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournament_teams');
    }
};
