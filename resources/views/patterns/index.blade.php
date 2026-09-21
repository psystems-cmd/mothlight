<h1>Dream patterns</h1>


@if ($patterns->isEmpty())
    <p>No patterns found.</p>
    
@else    
    <ul> 
        @foreach ($patterns as $currentPattern)
            <x-breeze.pattern-card>
                {{ $currentPattern->name }}
            </x-breeze.pattern-card>
        @endforeach
    </ul> 
@endif
