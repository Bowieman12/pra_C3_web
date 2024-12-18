<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\Team;
use App\Models\User;
use App\Models\Game;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check()) {
                view()->share('admin', auth()->user()->admin);
            }
            return $next($request);
        });

        return view('admin.index');
    }
    public function admin()
    {
        $teams =  Team::all();
        $users = User::all();
        $tournaments = Tournament::all();
        $games = Game::all();
        return view('admin.index', ['games' => $games, 'teams' => $teams, 'users' => $users, 'tournaments' => $tournaments]);
    }
}
