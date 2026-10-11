{{-- Design branch: generated with Claude (AI). --}}
{{-- One dream in a list, linking to its page. Used on the dreams page, a pattern's page and the dashboard. --}}
@props(['dream', 'showPrivacy' => false])

<li class="group border-t border-dusk py-7 first:border-t-0 first:pt-0">
    <p class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm text-haze">
        {{ $dream->dreamt_at->format('j F, H:i') }}
        @if ($showPrivacy)
            @if ($dream->is_public)
                <span class="rounded-full border border-haze/30 px-2.5 py-0.5 text-xs">Public</span>
            @else
                <span class="rounded-full border border-ember/40 px-2.5 py-0.5 text-xs text-ember">Private</span>
            @endif
        @endif
        @if ($showPrivacy && auth()->check() && auth()->id() !== $dream->user_id)
            <span class="text-xs text-haze/70">by {{ $dream->user?->name }}</span>
        @endif
    </p>

    <h2 class="mt-1.5 font-display text-2xl leading-snug">
        <a href="{{ route('dreams.show', $dream->id) }}" class="rounded-sm text-dust group-hover:text-lamp">{{ $dream->title }}</a>
    </h2>

    <p class="mt-2 max-w-prose leading-relaxed text-haze">
        {{ $dream->tldr }}
    </p>

    @if ($dream->patterns->isNotEmpty())
        <ul class="mt-4 flex flex-wrap gap-2">
            @foreach ($dream->patterns as $currentPattern)
                <li><x-moth.pill :pattern="$currentPattern" size="xs" /></li>
            @endforeach
        </ul>
    @endif
</li>
