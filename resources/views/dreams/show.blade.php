<h1>
    {{ $dreamDetails->title }}
</h1>

<div>
    {{ $dreamDetails->dreamt_at }}


<h2>Patterns</h2>
    <ul>
        @foreach ($dreamDetails->patterns as $currentPattern)
            <li>
            <a href="{{ route('patterns.show', $currentPattern->id) }}">
                {{ $currentPattern->name }}
            </a>
        </li>
    @endforeach
    </ul>

</div>

<div>
    {{ $dreamDetails->tldr }}
    {{ $dreamDetails->description }}
</div>