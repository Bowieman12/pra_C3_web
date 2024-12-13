<header class="flex items-center justify-between p-2.5 bg-gray-600 text-white">
    <div class="logo" style="flex: 1;">
        <a href="/" style="text-decoration: none; font-size: 24px; font-weight: bold; color: ">Voetbal</a>
    </div>
    <nav style="flex: 2;">
        <ul style="display: flex; justify-content: space-around; list-style: none; padding: 0; margin: 0;">
            <li>
                @if(auth()->user() && auth()->user()->team)
                    <a href="{{ route('teams.edit', ['id' => auth()->user()->team->id]) }}" style="text-decoration: none;">Team bewerken</a>
                @else
                    <span style="color: gray;">Geen team beschikbaar</span>
                @endif
            </li>
            <li><a href="{{ route('scoreboard.index')}}" style="text-decoration: none;">Scoreboard</a></li>
            <li><a href="{{ route('register')}}" style="text-decoration: none;">casino</a></li>
            <li><a href="/" style="text-decoration: none; ">Sport</a></li>
            <a href="{{ route('tournaments.index') }}" style="text-decoration: none;">
                Bekijk Alle Toernooien
            </a>
                @guest
                    <li><a href="{{ auth()->check() ? route('advertenties.create') : route('login') }}"
                            style="text-decoration: none; color: ">inloggen</a></li>
                    <li><a href="{{ route('register') }}" style="text-decoration: none; ">Registreren</a></li>
                @endguest

            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none;  cursor: pointer;">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
