<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'tournament_teams');
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }
    protected $fillable = [
        'title',
        'max_teams',

    ];

}
