{{-- Design branch: generated with Claude (AI). --}}
{{-- A dusky, see-through box, e.g. around a form --}}
<div {{ $attributes->merge(['class' => 'rounded-3xl border border-haze/15 bg-dusk/40 p-6 shadow-[0_0_60px_rgba(110,72,190,0.22)] backdrop-blur-md sm:p-9']) }}>
    {{ $slot }}
</div>
