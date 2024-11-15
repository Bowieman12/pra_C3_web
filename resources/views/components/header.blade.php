<header style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background-color: #f8f9fa;">
    <div class="logo" style="flex: 1;">
        <a href="/" style="text-decoration: none; font-size: 24px; font-weight: bold; color: #333;">Voetbal</a>
    </div>
    <nav style="flex: 2;">
        <ul style="display: flex; justify-content: space-around; list-style: none; padding: 0; margin: 0;">
            <li><a href="/" style="text-decoration: none; color: #333;">Team maken</a></li>
            <li><a href="/" style="text-decoration: none; color: #333;">Scoreboard</a></li>
            <li><a href="/" style="text-decoration: none; color: #333;">Sport</a></li>
            
            @guest
                <li><a href="{{ auth()->check() ? route('advertenties.create') : route('login') }}" style="text-decoration: none; color: #333;">inloggen</a></li>
                <li><a href="{{ route('register') }}" style="text-decoration: none; color: #333;">Registreren</a></li>
            @endguest

            @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #333; cursor: pointer;">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
