<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function teams()
    {
        return $this->hasManyThrough(Team::class, TournamentTeam::class, 'tournament_id', 'id', 'id', 'team_id');
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
