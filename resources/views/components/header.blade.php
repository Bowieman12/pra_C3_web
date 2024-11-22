<header class="flex items-center justify-between p-2.5 bg-gray-600 text-white">
    <div class="logo" style="flex: 1;">
        <a href="/" style="text-decoration: none; font-size: 24px; font-weight: bold; color: ">Voetbal</a>
    </div>
    <nav style="flex: 2;">
        <ul style="display: flex; justify-content: space-around; list-style: none; padding: 0; margin: 0;">
            <li><a style="text-decoration: none;" href="{{ route('teams.create') }}">Team maken</a></li>
            <li><a href="/" style="text-decoration: none;">Scoreboard</a></li>
            <li><a href="/" style="text-decoration: none; ">Sport</a></li>

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
