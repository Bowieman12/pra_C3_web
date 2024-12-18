<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\GameController;
use Database\Seeders\TournamentSeeder;

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



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/adminpanel', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/tournament/create', [TournamentController::class, 'create'])->name('tournament.create');
    Route::put('/tournament/{id}', [TournamentController::class, 'update'])->name('tournament.update');
    Route::post('/tournament/create', [TournamentController::class, 'store'])->name('tournament.store');
    Route::put('/tournament/{match}/score', [TournamentController::class, 'update'])->name('tournament.update');
    Route::post('/tournament/create', [TournamentController::class, 'store'])->name('tournament.create');
    Route::get('/tournament/{id}/edit', [TournamentController::class, 'edit'])->name('tournament.edit');
    Route::delete('tournament/{id}', [TournamentController::class, 'delete'])->name('tournament.destroy');
    Route::get('/adminpanel', [AdminController::class, 'admin'])->name('admin.index');
});
Route::post('/tournaments/{tournament}/teams', [TournamentController::class, 'addTeam'])->name('tournaments.bracket');

Route::get('scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard.index');

Route::get('/tournament', [TournamentController::class, 'index'])->name('tournament.index');
Route::get('/tournament/{tournament}', [TournamentController::class, 'showBracket'])->name('tournament.bracket');

Route::get('/tournaments/{tournament}/teams', [TournamentController::class, 'showTeams'])->name('tournaments.showTeams');
Route::middleware(['auth'])->group(function () {
    Route::get('/teams/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/teams/update', [TeamController::class, 'update'])->name('teams.update');
});

Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');

Route::post('/tournament/{id}/add-team', [TournamentController::class, 'addTeam'])->name('tournament.addTeam');

Route::post('/tournament/{id}/start', [TournamentController::class, 'startTournament'])->name('tournament.start');

Route::patch('/game/{id}', [GameController::class, 'update'])->name('game.update');

require __DIR__.'/auth.php';
