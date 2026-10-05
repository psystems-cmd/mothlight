@extends('layouts.public')

@section('title', 'Dream patterns · Mothlight')

@section('content')
    <h1 class="font-display text-4xl tracking-tight text-dust sm:text-5xl">
        Dream patterns
    </h1>
    <p class="mt-3 max-w-md text-haze">
        Things that keep coming back in people's dreams. Open one to read the dreams that share it.
    </p>

    @if ($patterns->isEmpty())
        <p class="mt-12 text-haze">No patterns found.</p>
    @else
        <ul class="mt-12 flex flex-wrap gap-3">
            @foreach ($patterns as $currentPattern)
                <x-breeze.pattern-card>
                    <a href="{{ route('patterns.show', $currentPattern->id) }}"
                       class="block rounded-full border border-lamp/30 px-5 py-2.5 text-dust transition hover:border-lamp hover:bg-lamp/10 hover:shadow-[0_0_24px_rgba(255,200,97,0.25)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lamp">
                        {{ $currentPattern->name }}
                    </a>
                </x-breeze.pattern-card>
            @endforeach
        </ul>
    @endif
@endsection
