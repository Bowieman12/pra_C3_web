<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Game;

class TournamentController extends Controller
{
    public function create (Request $request)
    {
        $teams = Team::all(); // Haal alle teams op uit de database

        if ($teams->count() < 2) {
            return response()->json(['error' => 'Er moeten minimaal 2 teams zijn om een schema te genereren.'], 400);
        }

        $schedule = [];

        for ($i = 0; $i < $teams->count(); $i++) {
            for ($j = $i + 1; $j < $teams->count(); $j++) {
                $schedule[] = [
                    'team1' => $teams[$i]->name,
                    'team2' => $teams[$j]->name,
                ];
            }
        }

        return response()->json($schedule);
    }

    public function update(Request $request, Game $game){
        $game->update([
            'team1_score' => $request->input('team1_score'),
            'team2_score' => $request->input('team2_score'),
        ]);

        return redirect()->back();
    }
    public function show(){
        $games = Game::with(['team1', 'team2'])->get();
        return view('tournaments.index', compact('games'));
        }
}
