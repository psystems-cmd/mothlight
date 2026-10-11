{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', $patternDetails->name . ' · Mothlight')

@section('content')
    <div style="--accent: {{ $patternDetails->accentHex() }}">

        {{-- The pattern's own hero: a halo in its colour, the name, and what it means --}}
        <header class="relative text-center">
            <div class="accent-aura pointer-events-none absolute -top-28 left-1/2 -z-10 h-80 w-[160%] -translate-x-1/2 blur-2xl" aria-hidden="true"></div>

            <p class="text-xs uppercase tracking-[0.2em] text-haze/70">Pattern</p>

            <h1 class="accent-text mt-4 font-display text-5xl leading-tight tracking-tight sm:text-6xl">{{ $patternDetails->name }}</h1>

            @if ($patternDetails->meaning())
                <p class="mx-auto mt-6 max-w-xl font-display text-lg italic leading-relaxed text-dust/90">
                    {{ $patternDetails->meaning() }}
                </p>
            @endif

            <span class="accent-rule mx-auto mt-9 block h-px w-32 opacity-70"></span>

            <p class="mt-9 text-sm text-haze">
                {{ $dreams->count() }} {{ Str::plural('shared dream', $dreams->count()) }} with this pattern
            </p>
        </header>

        @if ($dreams->isEmpty())
            <x-moth.panel class="mt-12 text-center">
                <p class="text-dust">Nobody has shared a dream with this pattern yet.</p>
                @auth
                    <a href="{{ route('dreams.create') }}" class="mt-5 inline-flex rounded-full border border-haze/40 px-5 py-2 text-sm text-dust hover:border-dust">Be the first</a>
                @endauth
            </x-moth.panel>
        @else
            <ul class="mt-12">
                @foreach ($dreams as $dream)
                    <x-dream-item :dream="$dream" />
                @endforeach
            </ul>
        @endif

        <div class="mt-16 text-center">
            <a href="{{ route('patterns.index') }}" class="rounded-sm text-sm text-haze underline decoration-haze/40 underline-offset-4 hover:text-dust hover:decoration-dust">All patterns</a>
        </div>
    </div>
@endsection
