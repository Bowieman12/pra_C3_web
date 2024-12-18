<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
class TournamentController extends Controller
{
    // Functie om het bracket te genereren
    public function showBracket($id)
    {
        $tournament = Tournament::findOrFail($id);
        $scores = $tournament->teams; // Haal de teams op die aan het toernooi zijn gekoppeld

        return view('tournaments.bracket', compact('tournament', 'scores'));
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
        $request->validate([
            'title' => 'required|string|max:255',
            'max_teams' => 'required|integer|min:1',
        ]);

        Tournament::create([
            'title' => $request->title,
            'max_teams' => $request->max_teams,
            'started' => null,
        ]);

        return redirect()->route('tournament.index');
    }

    public function delete(Tournament $tournament, $id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return redirect()->route('admin.index')->with('success', 'Toernooi succesvol verwijderd');
    }
    public function show($id)
    {
        $tournament = Tournament::findOrFail($id);

        // Haal het team van de ingelogde gebruiker op
        $userTeam = auth()->user()->team;

        if (!$userTeam) {
            return back()->with('error', 'Je hebt geen team om toe te voegen aan het toernooi.');
        }

        $scores = $tournament->teams; // Als je scores of teams in het toernooi wilt tonen

        return view('tournaments.show', compact('tournament', 'userTeam', 'scores'));
    }



    public function addTeam(Request $request, $tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);

        if ($tournament->started) {
            return redirect()->route('tournament.bracket', $tournamentId)
                             ->with('error', 'Teams kunnen niet worden toegevoegd nadat het toernooi is gestart.');
        }

        $team = Team::findOrFail($request->user()->team_id);

        if ($tournament->teams()->where('team_id', $team->id)->exists()) {
            return redirect()->route('tournament.bracket', $tournamentId)
                             ->with('error', 'Je team is al toegevoegd aan dit toernooi.');
        }

        $tournament->teams()->attach($team->id);

        return redirect()->route('tournament.bracket', $tournamentId)
                         ->with('success', 'Team toegevoegd aan het toernooi!');
    }


    public function startTournament($tournamentId)
    {
        $tournament = Tournament::findOrFail($tournamentId);

        if ($tournament->started) {
            return redirect()->route('tournament.bracket', $tournamentId)
                             ->with('error', 'Het toernooi is al gestart.');
        }

        $teams = $tournament->teams->pluck('id')->shuffle();
        $numTeams = $teams->count();
        $numRounds = ceil(log($numTeams, 2));

        $this->createBracket($tournament, $teams, $numRounds);

        $tournament->started = true;
        $tournament->save();

        return redirect()->route('tournament.bracket', $tournamentId)
                         ->with('success', 'Toernooi gestart!');
    }

    protected function createBracket($tournament, $teams, $numRounds)
    {
        $games = [];
        $roundTeams = $teams->toArray();

        for ($round = 1; $round <= $numRounds; $round++) {
            $roundGames = [];
            while (count($roundTeams) > 1) {
                $team1 = array_shift($roundTeams);
                $team2 = array_shift($roundTeams);
                $roundGames[] = $tournament->games()->create([
                    'team_1' => $team1,
                    'team_2' => $team2,
                ]);
            }
            $games[] = $roundGames;
            $roundTeams = array_map(fn($game) => $game->team_1, $roundGames);
        }
    }

}
