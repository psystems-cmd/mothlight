<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title', 'Mothlight')</title>

    <style type="text/tailwindcss">
    @layer base {
        body   { @apply bg-orange-50 text-gray-900; }
        h1     { @apply text-3xl font-bold mt-6 mb-4; }
        h2     { @apply text-xl font-semibold mt-6 mb-2; }
        a      { @apply text-violet-700 underline; }
        button { @apply bg-violet-600 text-white px-4 py-2 rounded; }
        input, textarea { @apply border rounded px-2 py-1 w-full; }
        label  { @apply block mt-4 font-medium; }
        }
    </style>

</head>
<body class="bg-orange-50 text-gray-900">

    <header>
        <nav class="flex gap-4 p-4 border-b">
            <a href="{{ route('home') }}">Mothlight</a> |
            <a href="{{ route('dreams.index') }}">Dreams</a> |
            <a href="{{ route('patterns.index') }}">Patterns</a> |

            @auth
                <a href="{{ route('dashboard') }}">My dreams</a> |
                <a href="{{ route('dreams.create') }}">New dream</a> |
                <a href="{{ route('profile.edit') }}">Profile</a> |

                <form method="POST" action="{{ route('logout') }}" style="display: inline">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}">Log in</a> |
                <a href="{{ route('register') }}">Sign up</a>
            @endauth
        </nav>
    </header>

    <main class="max-w-3xl mx-auto p-6">
        @yield('content')
    </main>

    <footer>
        <p>Mothlight, a dream journal for friend groups.</p>
    </footer>

</body>
</html>