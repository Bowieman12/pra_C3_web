<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/themes.css') }}">
</head>
<x-header />

<body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
    <nav class="flex justify-center items-center bg-white dark:bg-gray-900 p-4 rounded-lg shadow-md">

    </nav>
    <div class=" my-[2rem] flex justify-center">

        <div class=" p-8 mr-[2rem]">
            <img class="border-2 border-gray-700 mr-[1rem]" src="{{ asset('img/uitleg.jpg') }}" alt="img">
            <h1 class="mr-[6rem] border-t-2 border-gray-400">Uitleg</h1>
            <p class="border-2 border-black">Lorem ipsum disicing elit. Recusandae maiores minus minima delectus illum! Sint quidem repellendus exercitationem repellat aspernatur obcaecati iste ut at harum odio fugiat, doloremque non voluptate.</p>

        </div>


        <div class="p-8">
            <img class="border-2 border-gray-700 mr-[1rem]" src="{{ asset('img/casino.jpg') }}" alt="img">
            <h1 class="mr-[5rem] border-t-2 border-gray-400">casino</h1>
            <p class="border-2 border-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, molestias, provident voluptatibus eaque quasi ipsa architecto consequatur commodi aspernatur nemo, exercitationem animi velit fugit tenetur voluptatem aliquid ipsum corrupti vitae!</p>
        </div>
    </div>
    </div>

    <div class=" my-[3rem] flex justify-center">

        <div class=" p-8 mr-[2rem]">
            <img class="border-2 border-gray-700 mr-[1rem]" src="{{ asset('img/sport.jpg') }}" alt="img">
            <p class="mr-[6rem] border-t-2 border-gray-400">Sport</p>
            <p class="border-2 border-black">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus, impedit corrupti architecto accusamus ad ut qui dicta nemo dolor. A commodi repellendus fugiat harum officiis, dolore quis quasi explicabo veniam.</p>
        </div>

        <div class=" p-8">
            <img class="border-2 border-gray-700 mr-[1rem]" src="{{ asset('img/scoreboard.jpg') }}" alt="img">
            <p class="mr-[3rem] border-t-2 border-gray-400">Scoreboard</p>
            <p class="border-2 border-black">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate ipsam temporibus, consectetur error maxime perferendis et! Error, iure voluptatem, assumenda, unde aliquam esse iste dicta facere qui aspernatur aperiam sint?</p>
        </div>
    </div>
    <x-footer />
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
