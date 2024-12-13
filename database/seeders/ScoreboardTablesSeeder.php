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
            ['name' => 'FC Barcelona',  'punten' => 15],
            ['name' => 'Real Madrid',  'punten' => 10],
            ['name' => 'Ajax',  'punten' => 8],
            ['name' => 'ASC Monaco',  'punten' => 2],

        ]);

    }
}
