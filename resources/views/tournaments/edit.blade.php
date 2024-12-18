<form action="{{ route('tournament.update', $tournament->id) }}" method="POST" class="flex flex-col gap-4">
    @csrf
    @method('PUT')

    <div class="flex flex-col">
        <label for="id" class="font-semibold">Id</label>
        <input type="text" id="id" name="id" value="{{ $tournament->id }}" readonly
            class="border border-gray-300 rounded p-2 bg-gray-100">
    </div>

    <div class="flex flex-col">
        <label for="title" class="font-semibold">Title</label>
        <input type="text" name="title" id="title" value="{{ $tournament->title }}" required
            class="border border-gray-300 rounded p-2">
    </div>

    <div class="flex flex-col">
        <label for="max_teams" class="font-semibold">Maximum Teams</label>
        <input type="number" name="max_teams" value="{{ $tournament->max_teams }}"
            class="border border-gray-300 rounded p-2">
    </div>

    <div class="flex flex-col">
        <label for="created_at" class="font-semibold">Created at</label>
        <input type="date" name="created_at"
            value="{{ $tournament->created_at ? $tournament->created_at->format('Y-m-d') : '' }}"
            class="border border-gray-300 rounded p-2">
    </div>

    <div class="flex space-x-4">
        <button class="border-gray-950 border-2 text-green-600 px-4 py-2" type="submit">
            Update Tournament
        </button>

        <a class="border-2 border-gray-700 text-blue-700 px-4 py-2" href="{{ route('tournament.index') }}">
            Back to Tournament
        </a>
    </div>
</form>
