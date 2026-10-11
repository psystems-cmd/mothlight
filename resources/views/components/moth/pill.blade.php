{{-- Design branch: generated with Claude (AI). --}}
{{-- One pattern, as a small coloured pill. Links to the pattern's page unless :link is false. --}}
@props(['pattern', 'link' => true, 'size' => 'sm'])

@php
    $padding = $size === 'xs' ? 'px-3 py-0.5 text-xs' : 'px-4 py-1.5 text-sm';
@endphp

@if ($link)
    <a href="{{ route('patterns.show', $pattern->id) }}"
       style="--accent: {{ $pattern->accentHex() }}"
       class="pill inline-block rounded-full {{ $padding }}">{{ $pattern->name }}</a>
@else
    <span style="--accent: {{ $pattern->accentHex() }}"
          class="pill inline-block rounded-full {{ $padding }}">{{ $pattern->name }}</span>
@endif
