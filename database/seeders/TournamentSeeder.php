<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tournament;

class TournamentSeeder extends Seeder
{
    public function run()
    {
        Tournament::create([
            'title' => 'Tournament 1',
            'max_teams' => 8,
            'started' => now(), // Stel een startdatum in
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Tournament::create([
            'title' => 'Tournament 2',
            'max_teams' => 16,
            'started' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}