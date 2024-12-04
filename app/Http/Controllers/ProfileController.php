<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    // ... andere methoden ...

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'players' => 'required|json',
            'photo' => 'nullable|image|max:2048',
        ]);

        $team = new Team();
        $team->naam = $request->naam;
        $team->players = $request->players;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $team->photo = $path;
        }

        $team->save();

        return redirect()->route('teams.index')->with('success', 'Team succesvol aangemaakt.');
    }
}
