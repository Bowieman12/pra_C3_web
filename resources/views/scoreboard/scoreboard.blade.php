<x-home-layout>
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
                <td class="border px-4 py-2">{{ $team->id }}</td>
                <td class="border px-4 py-2">{{ $team->name }}</td>
                <td class="border px-4 py-2">{{ $team->score }}</td>
            </tr>
        </tb>
        @endforeach

    </table>
</x-home-layout>
