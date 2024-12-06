@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Bewerk je Team</h1>

    <!-- Formulier om team te bewerken -->
    <form action="{{ route('teams.update', $team->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Teamnaam veld -->
        <div class="form-group">
            <label for="name">Teamnaam</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $team->name) }}" required>
        </div>

        <!-- Spelersveld (bijvoorbeeld een lijst van spelers) -->
        <div class="form-group">
            <label for="players">Spelers</label>
            <textarea id="players" name="players" class="form-control">{{ old('players', json_encode($team->players)) }}</textarea>
        </div>

        <!-- Submit knop -->
        <button type="submit" class="btn btn-primary">Bijwerken</button>
    </form>
</div>

@endsection