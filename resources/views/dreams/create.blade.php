@extends('layouts.public')

@section('content')

<h1>New dream</h1>

<form method="POST" action="{{ route('dreams.store') }}">
    @csrf

    <div>
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ old('title') }}">
        @error('title') <p>{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="tldr">TL;DR</label>
        <input id="tldr" type="text" name="tldr" value="{{ old('tldr') }}">
        @error('tldr') <p>{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="description">What happened?</label>
        <textarea id="description" name="description" rows="6">{{ old('description') }}</textarea>
        @error('description') <p>{{ $message }}</p> @enderror
    </div>

    <div>
        <label for="dreamt_at">When did you dream it?</label>
        <input id="dreamt_at" type="datetime-local" name="dreamt_at" step="1800" value="{{ old('dreamt_at') }}">
        @error('dreamt_at') <p>{{ $message }}</p> @enderror
    </div>

    <div>
        <label>
            <input type="checkbox" name="woke_after" value="1" @checked(old('woke_after'))>
            I woke up right after
        </label>
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_public" value="1" @checked(old('is_public'))>
            Share this dream publicly
        </label>
    </div>

    <fieldset>
        <legend>Patterns</legend>
        @foreach ($patterns as $currentPattern)
            <label>
                <input type="checkbox" name="patterns[]" value="{{ $currentPattern->id }}"
                       @checked(in_array($currentPattern->id, old('patterns', [])))>
                {{ $currentPattern->name }}
            </label>
        @endforeach
        @error('patterns.*') <p>{{ $message }}</p> @enderror
    </fieldset>

    <button type="submit">Save dream</button>
</form>
@endsection
