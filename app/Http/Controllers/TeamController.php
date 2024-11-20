<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function create()
    {
        $players = Player::all(); // Haal alle geregistreerde spelers op
        return view('create_team', compact('players'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',
            'players' => 'required|array',
            'players.*' => 'string|max:255',
        ]);
    
        $team = Team::create(['name' => $request->team_name]);
    
        foreach ($request->players as $playerName) {
            $team->players()->create(['name' => $playerName]);
        }
    
        return redirect()->route('teams.index')->with('success', 'Team met spelers aangemaakt!');
    }
    
    
}
