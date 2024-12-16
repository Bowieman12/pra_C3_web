<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alle Toernooien</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <x-header />

    <div class="container mx-auto flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-2xl font-bold mb-4">Alle Toernooien</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        @if($tournaments->isEmpty())
            <p>Er zijn geen toernooien beschikbaar.</p>
        @else
            <ul class="mt-4 w-full space-y-4">
                @foreach($tournaments as $tournament)
                    <li class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center">
                        <a href="{{ route('tournament.bracket', $tournament->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">
                            {{ $tournament->title }}
                        </a>
                        <span class="text-sm text-gray-500">
                            @if($tournament->started)
                                {{ \Carbon\Carbon::parse($tournament->started)->format('d-m-Y') }}
                            @else
                                Nog niet gestart
                            @endif
                        </span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <x-footer />
</body>
</html>
