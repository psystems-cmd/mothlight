<h1>Dream patterns</h1>


@if ($patterns->isEmpty())
    <p>No patterns found.</p>
    
@else    
    <ul> 
        @foreach ($patterns as $currentPattern)
            <li>{{ $currentPattern->name }}</li>
        @endforeach
    </ul> 
    
@endif
