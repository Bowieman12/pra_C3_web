<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function create()
    {
        $players = Player::all();
        return view('teams.create_team', compact('players'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',
            'player_name.*' => 'required|string|max:255',
            'player_email.*' => 'required|email|distinct',
        ]);

        $team = Team::create(['name' => $request->team_name]);

        foreach ($request->player_name as $index => $name) {
            Player::create([
                'name' => $name,
                'email' => $request->player_email[$index],
                'team_id' => $team->id,
            ]);
        }

        return redirect()->route('teams.index')->with('success', 'Team met spelers aangemaakt!');
    }
}
