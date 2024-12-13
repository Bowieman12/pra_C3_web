<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    // Functie om het bracket te genereren
    public function generateBracket($tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);
        $teams = $tournament->teams;

        if ($teams->count() % 2 !== 0) {
            return back()->with('error', 'Het aantal teams moet even zijn voor een bracket.');
        }

        $round = 1; // Begin met de eerste ronde
        $matches = $teams->chunk(2);

        foreach ($matches as $pair) {
            Game::create([
                'tournament_id' => $tournament->id,
                'team_1' => $pair[0]->id,
                'team_2' => $pair[1]->id,
                'round' => $round,
            ]);
        }

        return redirect()->route('tournaments.show', $tournamentId)
                         ->with('success', 'Bracket succesvol gegenereerd!');
    }

    // Functie om toernooien te tonen
    public function index()
    {
        // Haal alle toernooien op
        $tournaments = Tournament::all();
        
        // Geef de toernooien door naar de view
        return view('tournaments.index', compact('tournaments'));
    }
}
