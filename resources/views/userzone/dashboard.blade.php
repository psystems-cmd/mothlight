@extends('layouts.public')

@section('content')

    <h1>Hello, {{ auth()->user()->name }}</h1>

    @if (auth()->user()->is_admin)
        <p>You're an admin, so you see every dream here, including private ones.</p>
    @else
        <p>These are your dreams. Only you can see the private ones.</p>
    @endif

    <!--from here everythong is for all users -->

    <p><a href="{{ route('dreams.create') }}">New dream</a></p>

    @if ($dreams->isEmpty())
        <p>No dreams yet. Write down your first one.</p>
    @else
        <ul>
            @foreach ($dreams as $currentDream)
                <li>
                    <a href="{{ route('dreams.show', $currentDream->id) }}">{{ $currentDream->title }}</a>
                    ({{ $currentDream->dreamt_at->format('j F, H:i') }},
                    @if ($currentDream->is_public)
                        public)
                    @else
                        private)
                    @endif
                    - {{ $currentDream->user->name }}
                </li>
            @endforeach
        </ul>
    @endif

@endsection