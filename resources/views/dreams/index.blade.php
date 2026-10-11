@extends('layouts.public')

@section('content')

<h1>
    Dreams
</h1>

<ul>
    @foreach ($dreams as $currentDream)
        <li>
            <a href="{{ route('dreams.show', $currentDream->id) }}">
            {{ $currentDream->title }}
            </a>
        </li>
        
    @endforeach
</ul>
@endsection
