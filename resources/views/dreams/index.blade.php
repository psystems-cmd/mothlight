@extends('layouts.public')

@section('title', 'Shared dreams · Mothlight')

@section('content')
    <h1 class="font-display text-4xl tracking-tight text-dust sm:text-5xl">
        Shared dreams
    </h1>
    <p class="mt-3 max-w-md text-haze">
        Dreams people chose to make public.
    </p>

    @if ($dreams->isEmpty())
        <p class="mt-12 text-haze">
            Nobody has shared a dream yet.
        </p>
    @else
        <ul class="mt-12">
            @foreach ($dreams as $currentDream)
                <x-dream-item :dream="$currentDream" />
            @endforeach
        </ul>
    @endif
@endsection
