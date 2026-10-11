{{-- Design branch: generated with Claude (AI). --}}
@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-haze']) }}>
    {{ $value ?? $slot }}
</label>
