<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
</head>

<body class="my-[6rem] ">
    <nav class="flex justify-center item">
        <a class="border-2 border-black mr-[1rem] hover:bg-neutral-300 " href="#">Team maken</a>
        <a class="border-2 border-black mr-[1rem]  hover:bg-neutral-300  " href="#">Scoreboard</a>
        <a class="border-2 border-black mr-[1rem]  hover:bg-neutral-300  " href="#">Casino</a>
        <a class="border-2 border-black  hover:bg-neutral-300 " href="#">Sport</a>
    </nav>
    <div class=" my-[2rem] flex justify-center">
        <div class="border-2 border-black p-8 mr-[2rem]">
            <img class="mr-[1rem]" src="{{ asset('img/uitleg.jpg') }}" alt="img">
            <p class="mr-[5rem] border-t-2 border-gray-400">uitleg</p>
        </div>
    </div>

    <div class="my-[2rem] flex justify-center">
        <div class="border-2 border-black  p-8">
            <img class="mr-[1rem]" src="{{ asset('img/casino.jpg') }}" alt="img">
        </div>
    </div>

    <div class=" my-[3rem] flex justify-center">

        <div class="border-2 border-black p-8 mr-[2rem]">
            <img class="mr-[1rem]" src="{{ asset('img/sport.jpg') }}" alt="img">
            <p class="mr-[5rem] border-t-2 border-gray-400">Sport</p>
        </div>

        <div class="border-2 border-black p-8">
            <img class="mr-[1rem]" src="{{ asset('img/scoreboard.jpg') }}" alt="img">
            <p class="border-t-2 border-gray-400">Scoreboard</p>

        </div>
    </div>
</body>

</html>
