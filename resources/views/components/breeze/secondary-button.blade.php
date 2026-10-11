{{-- Design branch: recoloured for the dark theme with Claude (AI). --}}
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center rounded-full border border-haze/40 px-6 py-3 font-medium text-dust transition hover:border-dust disabled:opacity-25']) }}>
    {{ $slot }}
</button>
