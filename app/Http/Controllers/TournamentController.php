<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    // Functie om het bracket te genereren
    public function showBracket($tournament)
    {
        $scores = Tournament::all();
        $tournament = Tournament::findOrFail($tournament);
        $teams = $tournament->teams;

        if ($teams->count() % 2 !== 0) {
            return back()->with('error', 'Het aantal teams moet even zijn voor een bracket.');
        }

        $round = 1;
        $matches = $teams->chunk(2);

        foreach ($matches as $pair) {
            Game::create([
                'tournament_id' => $tournament->id,
                'team_1' => $pair[0]->id,
                'team_2' => $pair[1]->id,
                'round' => $round,
            ]);
        }

        return view('tournaments.bracket', compact('tournament', 'teams',  'scores'));
    }



    // Functie om toernooien te tonen
    public function index()
    {
        // Haal alle toernooien op
        $tournaments = Tournament::all();

        // Geef de toernooien door naar de view
        return view('tournaments.index', compact('tournaments'));
    }

    public function edit($id)
    {
        $tournament = Tournament::findOrFail($id);
        return view('tournaments.edit', compact('tournament'));
    }
    public function update(Request $request, Tournament $tournament, $id)
    {
        $tournament = Tournament::findOrFail($id);
        $request->validate([
            'title' => ['required', 'string'],
            'max_teams' => ['required', 'numeric'],
            'created_at' => 'required|date',
        ]);

        $tournament->title = $request->input('title');
        $tournament->max_teams = $request->input('max_teams');
        $tournament->created_at = $request->input('created_at');

        $tournament->save();

        return redirect()->route('tournament.index');
    }

    public function create()
    {
        return view('tournaments.create');
    }

    public function store(Request $request)
    {
        // Validate the request input
        $request->validate([
            'title' => 'required|string|max:255', // Validation rule for title
            'max_teams' => 'required|integer|min:1', // Validation rule for max_teams
        ]);

        // Create and save the tournament
        $tournaments = Tournament::create([
            'title' => $request->title,
            'max_teams' => $request->max_teams,
        ]);

        return redirect()->route('tournament.index');
    }

    public function delete(Tournament $tournament, $id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return redirect()->route('admin.index')->with('success', 'Toernooi succesvol verwijderd');
    }

}
