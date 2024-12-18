<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);

        if (auth()->user()->role !== 'admin' && auth()->user()->role !== 'referee') {
            return redirect()->back()->with('error', 'Je hebt geen toegang om dit te doen.');
        }

        $winnerId = $request->input('winner');

        if ($winnerId == $game->team_1) {
            $game->team_1_score = 1;
            $game->team_2_score = 0;
        } else {
            $game->team_1_score = 0;
            $game->team_2_score = 1;
        }

        $game->save();

        $this->processNextRound($game, $winnerId);

        return redirect()->back()->with('success', 'Winnaar gekozen!');
    }

    protected function processNextRound($game, $winnerId)
    {
        $tournament = $game->tournament;

        $remainingGames = $tournament->games()->where('team_1_score', 0)->where('team_2_score', 0)->count();
        if ($remainingGames == 1) {
            $tournament->winner_id = $winnerId;
            $tournament->save();
            return;
        }

        $nextGame = $tournament->games()->whereNull('team_1')->orWhereNull('team_2')->first();

        if ($nextGame) {
            if (is_null($nextGame->team_1)) {
                $nextGame->team_1 = $winnerId;
            } else {
                $nextGame->team_2 = $winnerId;
            }
            $nextGame->save();
        } else {
            $tournament->games()->create([
                'team_1' => $winnerId,
                'team_2' => null,
            ]);
        }
    }
}
