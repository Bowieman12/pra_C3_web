<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\GameController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        return 'Welkom Admin';
    });

    Route::get('/referee', function(){
        return 'Welkom Referee';
    });

    Route::get('/user', function(){
        return 'Welkom gebruiker';
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/teams/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/update', [TeamController::class, 'update'])->name('teams.update');
});

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('/tournaments/{tournament}/bracket', [TournamentController::class, 'showBracket'])->name('tournaments.bracket');

Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');

require __DIR__.'/auth.php';
