<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Game;

class TournamentController extends Controller
{
    public function create()
    {
        //16 teams aanmaken
        $teams = collect();
        for ($i = 1; $i <= 16; $i++) {
            $teams->push(Team::create(['name' => 'Team ' . $i]));
        }
        //opslitsen in twee groepen
        $leftSide = $teams->slice(0, 8);
        $rightSide = $teams->slice(8);

        //wedstrijden maken
        $games = [];
        for ($i = 0; $i < 8; $i++) {
            $games[] = Game::create([
                'tournament_id' => 1, // Verander dit als je een toernooi-model gebruikt
                'team1_id' => $leftSide[$i]->id,
                'team2_id' => $rightSide[$i]->id,
                'team1_score' => null,
                'team2_score' => null,
            ]);
            return view('tournament.index', compact('games'));
        }
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
        return view('tournament.show', compact('games'));
        }
}
