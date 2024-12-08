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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Tournament title
            $table->unsignedInteger('max_teams'); // Max number of teams
            $table->timestamp('started')->nullable(); // Nullable start timestamp
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
};
