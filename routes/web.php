<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScoreboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;



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

Route::get('teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('teams', [TeamController::class, 'store'])->name('teams.store');
Route::get('teams/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::put('teams/{id}', [TeamController::class, 'update'])->name('teams.update');
Route::delete('teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
require __DIR__.'/auth.php';
