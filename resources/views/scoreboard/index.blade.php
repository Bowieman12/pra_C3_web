<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Scoreboard</h1>
    <table>
        <th>
            <th class="border px-4 py-2">Id</th>
            <th class="border px-4 py-2">Team Name</th>
            <th class="border px-4 py-2">Score</th>
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

</body>
</html>
