<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bewerk je Team</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <x-header/>
    <div class="container mx-auto flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-2xl font-bold mb-4">Bewerk je Team</h1>

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

        <form action="{{ route('teams.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Teamnaam -->
            <div class="form-group mb-4">
                <label for="name" class="block text-sm font-medium text-white">Teamnaam</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black" 
                    value="{{ old('name', $team->name) }}" 
                    required>
            </div>

            <!-- Spelerslijst -->
            <div id="players-section" class="form-group mb-4">
                <label for="players" class="block text-sm font-medium text-white">Spelers</label>

                <div id="players-list">
                    @foreach(json_decode($team->players ?? '[]', true) as $index => $player)
                        <div class="player-item mb-2 flex items-center">
                            <input 
                                type="text" 
                                name="players[]" 
                                value="{{ $player }}" 
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black"
                                placeholder="Spelernaam">
                            <button type="button" class="ml-2 text-red-600 remove-player">Verwijderen</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="add-player" class="mt-2 text-blue-600">+ Voeg speler toe</button>
            </div>

            <!-- Opslaan -->
            <button 
                type="submit" 
                class="mt-4 inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Opslaan
            </button>
        </form>
    </div>
    <x-footer/>
    <!-- JavaScript voor dynamisch toevoegen/verwijderen van spelers -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const playersSection = document.getElementById('players-list');
            const addPlayerButton = document.getElementById('add-player');

            // Voeg een nieuwe speler toe
            addPlayerButton.addEventListener('click', () => {
                const playerDiv = document.createElement('div');
                playerDiv.classList.add('player-item', 'mb-2', 'flex', 'items-center');
                playerDiv.innerHTML = `
                    <input 
                        type="text" 
                        name="players[]" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-black"
                        placeholder="Spelernaam">
                    <button type="button" class="ml-2 text-red-600 remove-player">Verwijderen</button>
                `;
                playersSection.appendChild(playerDiv);

                // Voeg event listener toe aan de verwijderknop
                playerDiv.querySelector('.remove-player').addEventListener('click', () => {
                    playerDiv.remove();
                });
            });

            // Verwijder een bestaande speler
            document.querySelectorAll('.remove-player').forEach(button => {
                button.addEventListener('click', (e) => {
                    e.target.closest('.player-item').remove();
                });
            });
        });
    </script>
</body>
</html>
