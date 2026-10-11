{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', 'Dream patterns · Mothlight')

@section('content')
    <x-page-header title="Dream patterns" label="The recurring ones">
        Things that keep coming back in people's dreams. Open one to read the dreams that share it.
    </x-page-header>

    @if ($patterns->isEmpty())
        <p class="mt-12 text-center text-haze">No patterns found.</p>
    @else
        <ul class="mt-12 grid gap-4 sm:grid-cols-2">
            @foreach ($patterns as $currentPattern)
                <x-breeze.pattern-card>
                    <a href="{{ route('patterns.show', $currentPattern->id) }}"
                       style="--accent: {{ $currentPattern->accentHex() }}"
                       class="pattern-card-link flex h-full flex-col rounded-2xl bg-dusk/30 p-5 backdrop-blur-sm">
                        <span class="flex items-baseline justify-between gap-3">
                            <span class="font-display text-xl text-dust">{{ $currentPattern->name }}</span>
                            <span class="accent-text shrink-0 text-sm tabular-nums opacity-80">{{ $currentPattern->dreams_count }}</span>
                        </span>

                        @if ($currentPattern->meaning())
                            <span class="mt-2 block text-sm leading-relaxed text-haze">{{ $currentPattern->meaning() }}</span>
                        @endif

                        <span class="accent-rule mt-auto block h-px w-full pt-px opacity-40"></span>
                    </a>
                </x-breeze.pattern-card>
            @endforeach
        </ul>

        <p class="mt-10 text-center text-sm text-haze/70">
            The number is how many shared dreams carry that pattern.
        </p>
    @endif
@endsection
