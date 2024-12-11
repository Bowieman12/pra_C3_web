<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreboardTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scoreboards')->insert( [
            ['name' => 'FC Barcelona vs Real Madrid',  'score' => 2-2],
            ['name' => 'Ajax', 'score' => 2-1],
            ['name' => 'Manchester United v Barcelona', 'score:' => 2-0],
            ['name' => 'Arsenal v Tottenham', 'score:' => 1-5],
            ['name' => 'Chelsea v Manchester City', 'score:' => 2-5],
            ['name' => 'Everton v Leicster city', 'score:' => 3-0],
            ['name' => 'Juventus v Paris Saint-Germain', 'score:' => 3-2],
        ]);

    }
}
