<x-base-layout>
    <div class="container">
        <h1>Team Aanmaken</h1>
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="naam">Team Naam</label>
                <input type="text" class="form-control" id="naam" name="naam" required>
            </div>
            <div class="form-group">
                <label for="players">Spelers (JSON)</label>
                <textarea class="form-control" id="players" name="players" required></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Foto</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Aanmaken</button>
        </form>
    </div>
</x-base-layout>

