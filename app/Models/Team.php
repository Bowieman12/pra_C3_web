<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'players',

    ];

    public function user()
    {
        return $this->hasOne(User::class);

    }
    public function Games(){
        return $this->hasMany((Game::class));
    }
    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class, 'tournament_teams');
    }

}
