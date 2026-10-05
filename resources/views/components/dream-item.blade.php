{{-- One dream in a list. Used on the dreams page and on a pattern's page. --}}
@props(['dream'])

<li class="border-t border-dusk py-7 first:border-t-0 first:pt-0">
    <p class="text-sm text-haze">
        {{ $dream->dreamt_at->format('j F, H:i') }}
    </p>
    <h2 class="mt-1.5 font-display text-2xl leading-snug text-dust">
        {{ $dream->title }}
    </h2>
    <p class="mt-2 max-w-prose leading-relaxed text-haze">
        {{ $dream->tldr }}
    </p>
</li>
