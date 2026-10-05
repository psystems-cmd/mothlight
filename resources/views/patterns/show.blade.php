@extends('layouts.public')

@section('title', $patternDetails->name . ' · Mothlight')

@section('content')
    <a href="{{ route('patterns.index') }}" class="rounded-sm text-sm text-haze transition hover:text-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
        All patterns
    </a>

    <h1 class="mt-4 font-display text-4xl tracking-tight text-dust sm:text-6xl">
        {{ $patternDetails->name }}
    </h1>
    <p class="mt-3 text-haze">
        {{ $dreams->count() }} {{ Str::plural('shared dream', $dreams->count()) }} with this pattern
    </p>

    @if ($dreams->isEmpty())
        <p class="mt-12 text-haze">
            Nobody has shared a dream with this pattern yet.
        </p>
    @else
        <ul class="mt-12">
            {{-- $dream has no () bc it is not called as a function but as an object --}}
            @foreach ($dreams as $dream)
                <x-dream-item :dream="$dream" />
            @endforeach
        </ul>
    @endif
@endsection
