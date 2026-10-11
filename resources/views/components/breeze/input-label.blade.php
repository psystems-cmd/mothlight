{{-- Design branch: recoloured for the dark theme with Claude (AI). --}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-haze']) }}>
    {{ $value ?? $slot }}
</label>
