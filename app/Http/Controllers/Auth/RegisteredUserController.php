<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team; // Import Team model
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        // Gebruiker aanmaken
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Team aanmaken
        $team = Team::create([
            'name' => $user->name . "'s Team", // Standaard teamnaam gebaseerd op gebruiker
            'players' => json_encode([]), // Lege spelerslijst
        ]);
    
        // Team koppelen aan de gebruiker
        $user->team_id = $team->id;
        $user->save();
    
        // Gebruiker inloggen
        Auth::login($user);
    
        return redirect()->route('home')->with('success', 'Registratie succesvol en team aangemaakt!');
    }
}
