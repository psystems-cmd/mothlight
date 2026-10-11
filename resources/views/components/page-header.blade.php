{{-- Design branch: generated with Claude (AI). --}}
{{-- The centred title block at the top of a page: small label, title, and a line of text under it. --}}
@props(['title', 'label' => null])

<header class="text-center">
    @if ($label)
        <p class="font-sans text-xs uppercase tracking-[0.2em] text-lamp/70">{{ $label }}</p>
    @endif

    <h1 class="mt-3 font-display text-4xl tracking-tight text-dust sm:text-5xl">{{ $title }}</h1>

    @if ($slot->isNotEmpty())
        <p class="mx-auto mt-4 max-w-md leading-relaxed text-haze">{{ $slot }}</p>
    @endif

    <x-moth.divider class="mt-8" />
</header>
