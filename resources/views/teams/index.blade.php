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
    <div class="container">
        <h1 class="text-2xl font-semibold mb-4">Alle Teams</h1>


        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left border border-gray-300">Id</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Team Naam</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr class="odd:bg-gray-50 even:bg-white">

                        <td class="px-4 py-2 border border-gray-300">{{$team->id}}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $team->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer class="mt-[29rem]">
        <x-footer/>
    </footer>
</body>
</html>
