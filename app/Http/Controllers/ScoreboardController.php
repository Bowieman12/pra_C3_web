<?php

namespace App\Http\Controllers;

use App\Models\Scoreboard;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{

    public function show(){ 
        $scores = Score::all(); // Haalt alle gegevens op uit de teams-tabel
        return view('scoreboard.index', ['teams' => $scores]);
    }
}
