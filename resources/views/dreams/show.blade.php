@extends('layouts.public')

@section('content')

<h1>
    {{ $dreamDetails->title }}
</h1>

<div>
    {{ $dreamDetails->dreamt_at }}


<h2>Patterns</h2>
    <ul>
        @foreach ($dreamDetails->patterns as $currentPattern)
            <li>
            <a href="{{ route('patterns.show', $currentPattern->id) }}">
                {{ $currentPattern->name }}
            </a>
        </li>
    @endforeach
    </ul>

</div>

<div>
    {{ $dreamDetails->tldr }}
    {{ $dreamDetails->description }}
</div>

@auth
    @if ($dreamDetails->canChange(auth()->user()))
        <a href="{{ route('dreams.edit', $dreamDetails->id) }}">Edit</a>

        <form method="POST" action="{{ route('dreams.destroy', $dreamDetails->id) }}"
      onsubmit="return confirm('Delete this dream? This cannot be undone.')">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>


    @endif
@endauth

<h2>Comments</h2>

@forelse ($dreamDetails->comments as $currentComment)
    <div>
        <p>
            <strong>{{ $currentComment->user->name }}</strong>,
            {{ $currentComment->created_at->format('j F, H:i') }}
        </p>
        <p>{{ $currentComment->content }}</p>
    </div>
@empty
    <p>No comments yet.</p>
@endforelse

@endsection
