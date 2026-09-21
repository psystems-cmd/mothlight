<h1>Dream patterns</h1>


@if ($patterns->isEmpty())
    <p>No patterns found.</p>
    
@else    
    <ul> 
        @foreach ($patterns as $currentPattern)
            <x-breeze.pattern-card>
                <a href="/patterns/{{ $currentPattern->id }}">
                    {{ $currentPattern->name }}
                </a>
            </x-breeze.pattern-card>
        @endforeach
    </ul> 
@endif
