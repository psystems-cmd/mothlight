<h1>
    {{ $dreamDetails->title }}
</h1>

<div>
    {{ $dreamDetails->dreamt_at }}


<span>Patterns</span>
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