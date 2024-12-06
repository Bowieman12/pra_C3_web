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
        Schema::create('games', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('tournament_id')->constrained('tournaments')->cascadeOnDelete(); // FK to tournaments
            $table->foreignId('team_1')->constrained('teams')->cascadeOnDelete(); // FK to team 1
            $table->foreignId('team_2')->constrained('teams')->cascadeOnDelete(); // FK to team 2
            $table->unsignedInteger('team_1_score')->nullable(); // Team 1 score
            $table->unsignedInteger('team_2_score')->nullable(); // Team 2 score
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
};
