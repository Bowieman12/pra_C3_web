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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name'); // User name
            $table->string('email')->unique(); // Unique email
            $table->timestamp('email_verified_at')->nullable(); // Nullable email verification timestamp
            $table->string('password'); // Password
            $table->rememberToken(); // Remember token
            $table->foreignId('team_id')->nullable()->constrained('teams')->nullOnDelete(); // FK to teams
            $table->enum('role', ['user', 'referee', 'admin']); // Role enumeration
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
