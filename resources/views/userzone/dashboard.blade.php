{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', 'My dreams · Mothlight')

@section('content')
    <h1 class="font-display text-4xl tracking-tight text-dust sm:text-5xl">Hello, {{ auth()->user()->name }}</h1>

    @if (auth()->user()->is_admin)
        <p class="mt-3 max-w-md text-haze">You're an admin, so you see every dream here, including private ones.</p>
    @else
        <p class="mt-3 max-w-md text-haze">These are your dreams. Only you can see the private ones.</p>
    @endif

    @if ($dreams->isEmpty())
        <x-moth.panel class="mt-12">
            <p class="text-dust">No dreams yet.</p>
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
