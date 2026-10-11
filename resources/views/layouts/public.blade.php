<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mothlight')</title>
</head>
<body>

    <header>
        <nav>
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

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Mothlight, a dream journal for friend groups.</p>
    </footer>

</body>
</html>