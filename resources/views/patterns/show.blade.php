<h1> Dream Pattern Details </h1>

<h2>
    {{ $patternDetails->name }}
</h2>

<div>
    <ul>
                    {{-- $dream has no () bc it is not called as a function but as an object --}}

        @foreach ($patternDetails->dreams as $dream)
            <li>{{ $dream->title }}</li> 
        
        @endforeach
    </ul>
</div>