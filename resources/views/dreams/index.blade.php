{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', 'Shared dreams · Mothlight')

@section('content')
    <x-page-header title="Shared dreams" label="From the whole group">
        Dreams people chose to make public. Each one carries the patterns it was filed under.
    </x-page-header>

    @if ($dreams->isEmpty())
        <p class="mt-12 text-center text-haze">Nobody has shared a dream yet.</p>
    @else
        <ul class="mt-12">
            @foreach ($dreams as $currentDream)
                <x-dream-item :dream="$currentDream" />
            @endforeach
        </ul>
    @endif
@endsection
