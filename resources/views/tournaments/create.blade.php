<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <title>Document</title>
</head>
<body>
    <header>
        <x-header/>
    </header>
    <section>
        <div class="flex justify-center mb-[32em] mt-[5rem]">
            <form action="{{ route('tournament.store') }}" method="POST" class="flex flex-wrap gap-4 items-center">
                @csrf

                <div class="flex flex-col mb-[32em] mt-[5rem]">
                    <!-- Title Field -->
                    <div class="flex flex-col">
                        <label for="title" class="font-semibold">Title</label>
                        <input type="text" name="title" id="title" required class="border border-gray-300 rounded p-2">
                    </div>

                    <!-- Max Teams Field -->
                    <div class="flex flex-col">
                        <label for="max_teams" class="font-semibold">Maximum Teams</label>
                        <input type="number" name="max_teams" class="border border-gray-300 rounded p-2">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex space-x-4">
                        <button class="border-gray-950 border-2 text-green-600 px-4 py-2" type="submit">
                            Create Tournament
                        </button>

                        <a class="border-2 border-gray-700 text-blue-700 px-4 py-2" href="{{ route('tournament.index') }}">
                            Back to Tournament
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </section>
<footer>
    <x-footer/>
</footer>
</body>
</html>
