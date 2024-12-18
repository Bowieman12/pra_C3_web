<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $tournament->title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-header />
    <h1 class="text-xl flex justify-center font-bold mb-4">{{ $tournament->title }}</h1>
    <div class="flex justify-center mb-4">
        <form action="{{ route('tournament.addTeam', $tournament->id) }}" method="POST" class="flex">
            @csrf
            <button type="submit" class="border px-4 py-2 bg-blue-500 text-white">Voeg Mijn Team Toe aan Toernooi</button>
        </form>
    </div>
    @if(auth()->user()->role === 'admin')
        <div class="flex justify-center mb-4">
            <form action="{{ route('tournament.start', $tournament->id) }}" method="POST" class="flex">
                @csrf
                <button type="submit" class="border px-4 py-2 bg-green-500 text-white">Start Toernooi</button>
            </form>
        </div>
    @endif
    <h2 class="text-center text-lg font-bold mb-4">Toernooi Bracket</h2>

    @if(!$tournament->started)
        <h3 class="text-center mb-4">Teams in het Toernooi</h3>
        <ul class="list-disc list-inside mb-8">
            @foreach ($tournament->teams as $team)
                <li>{{ $team->name }}</li>
            @endforeach
        </ul>
    @else
        @if($tournament->winner_id)
            <h2 class="text-center text-lg font-bold mb-4">Winnaar: {{ $tournament->winner->name }}</h2>
        @else
            @foreach ($tournament->games->groupBy('round') as $round => $games)
                <h3 class="text-center mb-4">Ronde {{ $round }}</h3>
                <table class="w-full text-center mb-8">
                    <thead>
                        <tr>
                            <th>Team 1</th>
                            <th>Team 2</th>
                            <th>Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>
                                <td>{{ $game->team1->name }}</td>
                                <td>{{ $game->team2 ? $game->team2->name : 'Wacht op tegenstander' }}</td>
                                <td>
                                    @if($game->team_1_score === 0 && $game->team_2_score === 0)
                                        @if(auth()->user()->role === 'admin' || auth()->user()->role === 'referee')
                                            <form action="{{ route('game.update', $game->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="flex justify-center">
                                                    <label>
                                                        <input type="radio" name="winner" value="{{ $game->team1->id }}" required>
                                                        {{ $game->team1->name }}
                                                    </label>
                                                    @if($game->team2)
                                                        <label class="ml-4">
                                                            <input type="radio" name="winner" value="{{ $game->team2->id }}" required>
                                                            {{ $game->team2->name }}
                                                        </label>
                                                    @endif
                                                </div>
                                                <button type="submit" class="border px-4 py-2 bg-blue-500 text-white mt-2">Kies Winnaar</button>
                                            </form>
                                        @endif
                                    @else
                                        <span>Winnaar: {{ $game->team_1_score > $game->team_2_score ? $game->team1->name : $game->team2->name }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endif
    @endif
</body>

</html>
    