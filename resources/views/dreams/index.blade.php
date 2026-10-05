<h1>
    Dreams
</h1>

<ul>
    @foreach ($dreams as $currentDream)
        <li>
            {{ $currentDream->title }}
        </li>
        
    @endforeach
</ul>