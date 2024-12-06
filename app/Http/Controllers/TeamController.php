<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function create() {
        return view('teams.create_team');
    }

    public function store(Request $request) {
        $request->validate([
            'naam' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $team = new Team();
        $team->naam = $request->naam;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('team_logos', 'public');
            $team->foto = $path;
        }
        $team->save();

        return redirect()->route('teams.create')->with('success', 'Team toegevoegd!');
    }

    public function edit($id) {
        $team = Team::findOrFail($id);
        return view('teams.edit', compact('team'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'naam' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $team = Team::findOrFail($id);
        $team->naam = $request->naam;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('team_logos', 'public');
            $team->foto = $path;
        }
        $team->save();

        return redirect()->route('teams.create')->with('success', 'Team bijgewerkt!');
    }

    public function destroy($id) {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.create')->with('success', 'Team verwijderd!');
    }
}
