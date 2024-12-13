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
            $table->id(); 
            $table->foreignId('tournament_id')->constrained('tournaments')->cascadeOnDelete(); 
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournament_teams');
    }
};
