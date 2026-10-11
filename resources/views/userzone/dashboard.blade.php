{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', 'My dreams · Mothlight')

@section('content')
    <x-page-header :title="'Hello, ' . auth()->user()->name" label="Your journal">
        @if (auth()->user()->is_admin)
            {{ $viewingAll
                ? "You're an admin, so this is every dream in Mothlight, including private ones."
                : 'These are your own dreams. Only you can see the private ones.' }}
        @else
            These are your dreams. Only you can see the private ones.
        @endif
    </x-page-header>

    {{-- Admins can look at their own dreams or at everybody's --}}
    @if (auth()->user()->is_admin)
        <div class="mt-10 flex justify-center">
            <div class="inline-flex rounded-full border border-haze/20 bg-dusk/40 p-1 text-sm backdrop-blur-sm" role="group" aria-label="Which dreams to show">
                <a href="{{ route('dashboard', ['view' => 'mine']) }}"
                   @if (! $viewingAll) aria-current="true" @endif
                   class="rounded-full px-4 py-1.5 text-haze hover:text-dust aria-[current]:bg-lamp aria-[current]:font-medium aria-[current]:text-night">My dreams</a>
                <a href="{{ route('dashboard', ['view' => 'all']) }}"
                   @if ($viewingAll) aria-current="true" @endif
                   class="rounded-full px-4 py-1.5 text-haze hover:text-dust aria-[current]:bg-lamp aria-[current]:font-medium aria-[current]:text-night">Everyone's dreams</a>
            </div>
        </div>

        <p class="mt-4 text-center text-sm text-haze/70">
            {{ $dreams->count() }} {{ Str::plural('dream', $dreams->count()) }}{{ $viewingAll ? ' in total' : ' of yours' }}
        </p>
    @endif

    @if ($dreams->isEmpty())
        <x-moth.panel class="mt-12 text-center">
            <p class="text-dust">{{ $viewingAll ? 'There are no dreams in Mothlight yet.' : 'No dreams yet.' }}</p>
            <a href="{{ route('dreams.create') }}" class="mt-5 inline-flex rounded-full bg-lamp px-6 py-3 font-medium text-night shadow-[0_0_32px_rgba(255,200,97,0.35)] hover:bg-[#FFD685]">Write down your first one</a>
        </x-moth.panel>
    @else
        <ul class="mt-12">
            @foreach ($dreams as $currentDream)
                <x-dream-item :dream="$currentDream" :show-privacy="true" />
            @endforeach
        </ul>
    @endif
@endsection
