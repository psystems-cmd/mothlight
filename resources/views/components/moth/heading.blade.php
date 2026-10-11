{{-- Design branch: generated with Claude (AI). --}}
{{-- Title at the top of a login/register box, with an optional line of text under it --}}
@props(['title'])

<h1 class="font-display text-3xl tracking-tight text-dust">{{ $title }}</h1>
@if ($slot->isNotEmpty())
    <p class="mt-2 leading-relaxed text-haze">{{ $slot }}</p>
@endif
