<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Maken</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
</head>

<body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <header>
        @include('components.header')
    </header>

    <h1 class="text-2xl font-bold mb-4 text-white">TEAM MAKEN</h1>

    @if(!$team)
        <!-- Formulier om een team te maken -->
        <form id="team-form" action="{{ route('teams.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="mb-4">
                <label for="team_name" class="block text-sm font-medium text-white">Naam van het team</label>
                <input type="text" id="team_name" name="team_name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 bg-gray-200 text-gray-900 focus:bg-white">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Maak Team</button>
        </form>
    @else
        <!-- Formulier om spelers toe te voegen -->
        <h2 class="text-lg font-semibold mb-2 text-white">VOEG SPELERS TOE AAN {{ $team->name }}</h2>

        <form action="{{ route('teams.addPlayers', $team->id) }}" method="POST">
            @csrf
            <div id="players-container">
                <div class="player-entry mb-4">
                    <label for="player_name" class="block text-sm font-medium text-white">Naam speler</label>
                    <input type="text" name="player_name[]" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 bg-gray-200 text-gray-900 focus:bg-white">
                        
                    <label for="player_email" class="block text-sm font-medium text-white">E-mail van speler</label>
                    <input type="email" name="player_email[]" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 bg-gray-200 text-gray-900 focus:bg-white">
                </div>
            </div>

            <button type="button" id="add-player" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Voeg Speler Toe</button>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Spelers Toevoegen</button>
        </form>
    @endif

    <!-- Geregistreerde spelers -->
    @if($team)
        <h2 class="text-lg font-semibold mb-2 text-white">Geregistreerde Spelers</h2>
        <table class="min-w-full border border-gray-300 mb-4">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-white">NAAM</th>
                    <th class="border border-gray-300 px-4 py-2 text-white">E-MAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-white">{{ $player->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-white">{{ $player->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <footer>
        @include('components.footer')
    </footer>

    <script>
        document.getElementById('add-player').addEventListener('click', function () {
            const container = document.getElementById('players-container');

            const playerEntry = document.createElement('div');
            playerEntry.classList.add('player-entry', 'mb-4');

            playerEntry.innerHTML = `
                <label class="block text-sm font-medium text-white">Naam speler</label>
                <input type="text" name="player_name[]" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 bg-gray-200 text-gray-900 focus:bg-white">

                <label class="block text-sm font-medium text-white">E-mail van speler</label>
                <input type="email" name="player_email[]" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 bg-gray-200 text-gray-900 focus:bg-white">
            `;

            container.appendChild(playerEntry);
        });
    </script>

</body>

</html>
