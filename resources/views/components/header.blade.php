<header class="flex items-center justify-between p-2.5 bg-gray-600 text-white">
    <div class="logo" style="flex: 1;">
        <a href="/" style="text-decoration: none; font-size: 24px; font-weight: bold; color: ">Voetbal</a>
    </div>
    <nav style="flex: 2;">
        <ul style="display: flex; justify-content: space-around; list-style: none; padding: 0; margin: 0;">
            <li>
                @if (auth()->user() && auth()->user()->team)
                    <a href="{{ route('teams.edit', ['id' => auth()->user()->team->id]) }}"
                        style="text-decoration: none;">Team bewerken</a>
                @else
                    <span style="color: gray;">Geen team beschikbaar</span>
                @endif
            </li>
            <li><a href="{{ route('teams.index')}}" style="text-decoration: none;">Bekijk alle teams</a></li>
            <a href="{{ route('tournament.index') }}" style="text-decoration: none;">
                Bekijk Alle Toernooien
            </a>
                @guest
                    <li><a href="{{ auth()->check() ? route('advertenties.create') : route('login') }}"
                            style="text-decoration: none; color: ">inloggen</a></li>
                    <li><a href="{{ route('register') }}" style="text-decoration: none; ">Registreren</a></li>
                @endguest



            @if (auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('admin.index') }}">Admin panel</a>
            @endif

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
