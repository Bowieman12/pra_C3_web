<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Toon het formulier voor het aanmaken van een nieuw team.
     */
    public function create()
    {
        $players = Player::all(); // Haal alle spelers op, ongeacht het team
        $team = null; // Voor een nieuw team is er nog geen bestaand team

        return view('teams.create_team', compact('team', 'players'));
    }

    /**
     * Sla een nieuw team op met spelers.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:255',
            'player_name.*' => 'nullable|string|max:255', // Naam is optioneel
            'player_email.*' => 'nullable|email|distinct', // E-mail moet uniek zijn
        ]);

        // Maak een nieuw team aan
        $team = Team::create(['name' => $request->team_name]);

        // Controleer of spelersinformatie aanwezig is
        if ($request->has('player_name')) {
            foreach ($request->player_name as $index => $name) {
                if (!empty($name) && !empty($request->player_email[$index])) {
                    Player::create([
                        'name' => $name,
                        'email' => $request->player_email[$index],
                        'team_id' => $team->id,
                    ]);
                }
            }
        }

        return redirect()->route('teams.create')->with('success', 'Team met spelers aangemaakt!');
    }

    /**
     * Voeg spelers toe aan een bestaand team.
     */
    public function addPlayers(Request $request, $teamId)
    {
        $request->validate([
            'player_name.*' => 'required|string|max:255',
            'player_email.*' => 'required|email|distinct',
        ]);

        // Zoek het team op basis van het ID
        $team = Team::findOrFail($teamId);

        // Voeg nieuwe spelers toe aan het team
        foreach ($request->player_name as $index => $name) {
            Player::create([
                'name' => $name,
                'email' => $request->player_email[$index],
                'team_id' => $team->id,
            ]);
        }

        return redirect()->route('teams.create')->with('success', 'Spelers toegevoegd aan het team!');
    }
}
