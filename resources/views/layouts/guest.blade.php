<!DOCTYPE html>
{{-- Design branch: generated with Claude (AI). --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mothlight') }}</title>

    @include('layouts.partials.theme')
</head>
<body class="min-h-screen bg-night font-sans text-dust antialiased selection:bg-lamp selection:text-night">

    {{-- Same lamp and moths as on the public pages --}}
    <x-moth-sky />

    <div class="relative z-10 mx-auto flex min-h-screen max-w-3xl flex-col px-5 sm:px-8">
        <header class="py-6">
            <x-wordmark />
        </header>

        <main class="flex flex-1 items-center py-10">
            <div class="w-full max-w-md rounded-3xl border border-haze/15 bg-dusk/40 p-7 shadow-[0_0_60px_rgba(110,72,190,0.25)] backdrop-blur-md sm:p-10">
                {{ $slot }}
            </div>
        </main>

        <x-footer />
    </div>

</body>
</html>
