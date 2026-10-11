{{-- Design branch: recoloured for the dark theme with Claude (AI). --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-full bg-lamp px-6 py-3 font-medium text-night shadow-[0_0_32px_rgba(255,200,97,0.35)] transition hover:bg-[#FFD685]']) }}>
    {{ $slot }}
</button>
