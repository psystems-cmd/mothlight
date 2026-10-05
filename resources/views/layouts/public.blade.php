<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mothlight')</title>

    <!-- Fonts: Fraunces for headings and dream titles, Figtree for everything else -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,400i,600|figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Tailwind via CDN, same as layouts/app.blade.php -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Mothlight colours and fonts, usable as Tailwind classes (bg-night, text-lamp, font-display, ...) -->
    <style type="text/tailwindcss">
        @theme {
            --color-night: #160E2C;
            --color-dusk: #2E1D52;
            --color-haze: #B8A6E3;
            --color-dust: #EFE3D0;
            --color-lamp: #FFC861;
            --color-ember: #F0783C;
            --font-display: "Fraunces", Georgia, serif;
            --font-sans: "Figtree", ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-night font-sans text-dust antialiased selection:bg-lamp selection:text-night">

    {{-- The glowing lamp and the moths circling it, behind all page content --}}
    <x-moth-sky />

    <div class="relative z-10 mx-auto flex min-h-screen max-w-3xl flex-col px-5 sm:px-8">

        <header class="flex flex-wrap items-center justify-between gap-x-8 gap-y-3 py-6">
            <a href="/" class="group flex items-center gap-2.5 rounded-sm font-display text-2xl text-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                <svg viewBox="-10 -8 20 16" class="h-5 w-6 text-lamp transition group-hover:drop-shadow-[0_0_8px_#FFC861]" aria-hidden="true">
                    <path fill="currentColor" d="M0 -1 C-3 -8 -9 -7 -9.5 -3 C-10 0 -5 1 0 0 Z M0 -1 C3 -8 9 -7 9.5 -3 C10 0 5 1 0 0 Z M0 0 C-3 1 -7 3 -6 6 C-5 8 -2 5 0 1 Z M0 0 C3 1 7 3 6 6 C5 8 2 5 0 1 Z"/>
                </svg>
                Mothlight
            </a>

            <nav class="flex items-center gap-6 text-sm">
                <a href="{{ route('dreams.index') }}"
                   @if (request()->routeIs('dreams.*')) aria-current="page" @endif
                   class="rounded-sm text-haze transition hover:text-dust aria-[current=page]:text-lamp focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                    Dreams
                </a>
                <a href="{{ route('patterns.index') }}"
                   @if (request()->routeIs('patterns.*')) aria-current="page" @endif
                   class="rounded-sm text-haze transition hover:text-dust aria-[current=page]:text-lamp focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                    Patterns
                </a>

                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-full border border-lamp/40 px-4 py-1.5 text-lamp transition hover:bg-lamp/10 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lamp">
                        My dreams
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-sm text-haze transition hover:text-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                        Log in
                    </a>
                @endauth
            </nav>
        </header>

        <main class="flex-1 pb-20 pt-10 sm:pt-16">
            @yield('content')
        </main>

        <footer class="py-8 text-sm text-haze/70">
            Mothlight is a dream journal for friend groups. </br>
            Made with <span class="text-ember" aria-label="love">♥</span> by Soapbox Ventures.
        </footer>
    </div>

</body>
</html>
