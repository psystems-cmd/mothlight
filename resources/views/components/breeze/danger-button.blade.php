{{-- Design branch: recoloured for the dark theme with Claude (AI). --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-full bg-ember px-6 py-3 font-medium text-night transition hover:bg-[#F5925E]']) }}>
    {{ $slot }}
</button>
