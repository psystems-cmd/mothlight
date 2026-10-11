{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', 'Profile · Mothlight')

@section('content')
    <h1 class="font-display text-4xl tracking-tight text-dust sm:text-5xl">Profile</h1>

    {{-- The three forms come from Laravel Breeze; the [&_...] classes recolour their text for the dark theme --}}
    <div class="mt-10 space-y-6 [&_h2]:font-display [&_h2]:text-xl [&_h2]:text-dust [&_p]:text-haze [&_label]:text-haze">
        <x-moth.panel>
            <div class="max-w-xl">
                @include('userzone.profile.partials.update-profile-information-form')
            </div>
        </x-moth.panel>

        <x-moth.panel>
            <div class="max-w-xl">
                @include('userzone.profile.partials.update-password-form')
            </div>
        </x-moth.panel>

        <x-moth.panel>
            <div class="max-w-xl">
                @include('userzone.profile.partials.delete-user-form')
            </div>
        </x-moth.panel>
    </div>
@endsection
