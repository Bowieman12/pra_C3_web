<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <x-header />
    </header>
    <main>
        <h1 class="flex justify-center">Admin panel</h1>
        <a href="{{ route('tournament.create') }}">Create</a>
        <ul class="mt-4 w-full space-y-4">

            <div class="mt-[5rem] grid grid-cols-2 gap-4">
                <div>
                    @foreach ($teams as $team)
                        <ul class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center">
                            <span class="text-blue-600 font-medium">
                                <li>{{ $team->name }}</li>
                            </span>
                        </ul>
                    @endforeach
                </div>

                <div>
                    @foreach ($tournaments as $tournament)
                        <ul class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center">
                            <a href="{{ route('tournament.bracket', $tournament->id) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium">
                                {{ $tournament->title }}
                            </a>
                            <span>
                                <a class="text-blue-600 mr-[1rem]"
                                    href="{{ route('tournament.edit', $tournament->id) }}">Bewerken</a>
                                    <form action="{{ route('tournament.destroy', $tournament->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Verwijderen</button>
                                    </form>

                            </span>

                        </ul>
                    @endforeach

                    @foreach ($games as $game)
                        <ul lass="bg-white rounded-lg shadow-md p-4 flex justify-between items-center">
                            <span class="text-blue-600 font-medium">
                                <li>{{ $game->name->score }}</li>
                            </span>
                        </ul>
                    @endforeach

                </div>
            </div>

    </main>
    <footer class="mt-[38rem]">
        <x-footer />
    </footer>
</body>

</html>
