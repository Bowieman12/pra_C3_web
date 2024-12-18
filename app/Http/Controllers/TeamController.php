<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }
    
    // Laat het formulier zien voor het bewerken van het team van de ingelogde gebruiker
    public function edit()
    {
        $team = auth()->user()->team;

        // Zorg ervoor dat de gebruiker een team heeft
        if (!$team) {
            abort(404, 'Team niet gevonden.');
        }

        return view('teams.edit', compact('team'));
    }

    public function update(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'players' => 'nullable|array', // Valideer dat "players" een array is
            'players.*' => 'string|max:255', // Valideer dat elke speler een string is
        ]);

        // Haal het team van de ingelogde gebruiker op
        $team = auth()->user()->team;

        if (!$team) {
            return redirect()->route('teams.edit')->withErrors(['error' => 'Geen team gevonden!']);
        }

        // Update de teamnaam
        $team->name = $request->name;

        // Update de spelerslijst (als het aanwezig is in de request)
        if ($request->has('players')) {
            $team->players = json_encode($request->players); // Opslaan als JSON
        }

        $team->save();

        return redirect()->route('teams.edit')->with('success', 'Team succesvol bijgewerkt!');
    }

}
