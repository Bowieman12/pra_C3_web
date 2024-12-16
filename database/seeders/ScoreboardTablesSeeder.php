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
            ['name' => 'FC Barcelona',  'score' => 15],
            ['name' => 'Real Madrid',  'score' => 10],
            ['name' => 'Ajax',  'score' => 8],
            ['name' => 'ASC Monaco',  'score' => 2],

        ]);

    }
}
