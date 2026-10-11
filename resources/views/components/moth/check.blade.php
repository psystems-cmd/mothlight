{{-- Design branch: generated with Claude (AI). --}}
{{-- A checkbox with its label next to it --}}
@props(['label'])

<label class="flex items-center gap-3 text-dust">
    <input type="checkbox" {{ $attributes->merge(['class' => 'h-4 w-4 accent-lamp']) }}>
    {{ $label }}
</label>
