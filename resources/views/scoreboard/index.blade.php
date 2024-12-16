<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <header>
<x-header/>
    </header>
    <h1 class="text-xl flex justify-center font-bold mb-[2.5rem]">Scoreboard</h1>
    <div class="flex justify-center">
        <table class="mx-[10rem] text-center">
            <th>
                <th class="border px-4 py-2">Id</th>
                <th class="border px-4 py-2">Team name</th>
                <th class="border px-4 py-2">Points</th>
            </th>
            <tb>
                @foreach ($scores as $score)
                <tr>
                    <td class="border px-4 py-2">{{ $score->id }}</td>
                    <td class="border px-4 py-2">{{ $score->name }}</td>
                    <td class="border px-4 py-2">{{ $score->score }}</td>
                </tr>
            </tb>
            @endforeach


        </table>
    </div>

<footer class="mt-[25rem]">
    <x-footer/>
</footer>
</body>
</html>
