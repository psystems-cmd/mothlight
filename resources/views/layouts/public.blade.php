<!DOCTYPE html>
{{-- Design branch: generated with Claude (AI). --}}
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mothlight')</title>

    @include('layouts.partials.theme')
</head>
<body class="min-h-screen bg-night font-sans text-dust antialiased selection:bg-lamp selection:text-night">

    {{-- The glowing lamp and the moths circling it, behind all page content --}}
    <x-moth-sky />

    <div class="relative z-10 mx-auto flex min-h-screen max-w-3xl flex-col px-5 sm:px-8">

        <header class="flex flex-wrap items-center justify-between gap-x-8 gap-y-4 py-6">
            <x-wordmark />

            <nav class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm">
                <a href="{{ route('dreams.index') }}" @if (request()->routeIs('dreams.index', 'dreams.show')) aria-current="page" @endif class="rounded-sm text-haze hover:text-dust aria-[current=page]:text-lamp">Dreams</a>
                <a href="{{ route('patterns.index') }}" @if (request()->routeIs('patterns.*')) aria-current="page" @endif class="rounded-sm text-haze hover:text-dust aria-[current=page]:text-lamp">Patterns</a>

                @auth
                    <a href="{{ route('dashboard') }}" @if (request()->routeIs('dashboard')) aria-current="page" @endif class="rounded-sm text-haze hover:text-dust aria-[current=page]:text-lamp">My dreams</a>
                    <a href="{{ route('profile.edit') }}" @if (request()->routeIs('profile.*')) aria-current="page" @endif class="rounded-sm text-haze hover:text-dust aria-[current=page]:text-lamp">Profile</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="rounded-sm text-haze hover:text-dust">Log out</button>
                    </form>

                    <a href="{{ route('dreams.create') }}" class="rounded-full bg-lamp px-4 py-1.5 font-medium text-night shadow-[0_0_24px_rgba(255,200,97,0.35)] hover:bg-[#FFD685]">New dream</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-sm text-haze hover:text-dust aria-[current=page]:text-lamp">Log in</a>
                    <a href="{{ route('register') }}" class="rounded-full border border-lamp/40 px-4 py-1.5 text-lamp hover:bg-lamp/10">Sign up</a>
                @endauth
            </nav>
        </header>

        <main class="flex-1 pb-20 pt-10 sm:pt-14">
            @yield('content')
        </main>

        <x-footer />
    </div>

</body>
</html>
