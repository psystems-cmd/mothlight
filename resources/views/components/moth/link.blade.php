{{-- Design branch: generated with Claude (AI). --}}
{{-- A quiet text link, e.g. "Forgot your password?" --}}
<a {{ $attributes->merge(['class' => 'rounded-sm text-sm text-haze underline decoration-haze/40 underline-offset-4 transition hover:text-dust hover:decoration-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp']) }}>
    {{ $slot }}
</a>
