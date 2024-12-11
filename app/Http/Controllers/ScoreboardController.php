<?php

namespace App\Http\Controllers;

use App\Models\Scoreboard;
use Illuminate\Http\Request;

class ScoreboardController extends Controller
{

    public function index(){
        $scores = Scoreboard::all(); // Haalt alle gegevens op uit de teams-tabel
      //  $teams = Team::all();
        return view('scoreboard.index', ['scores' => $scores]);
    }
}
