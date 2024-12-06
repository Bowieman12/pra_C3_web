<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScoreboardTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            ['name' => 'Ajax', 'score' => 2-1],
            ['name' => 'Manchester United v Barcelona', 'score:' => 2-0],
            ['name' => 'Arsenal v Tottenham', 'score:' => 1-5],
            ['name' => 'Chelsea v Manchester City', 'score:' => 2-5],
            ['name' => 'Everton v Leicster city', 'score:' => 3-0],
        ]);
    }
}
