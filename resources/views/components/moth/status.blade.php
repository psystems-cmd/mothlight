{{-- Design branch: generated with Claude (AI). --}}
{{-- A confirmation message, e.g. "We have emailed your password reset link." --}}
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'rounded-xl border border-lamp/30 bg-lamp/10 px-4 py-3 text-sm text-lamp']) }}>
        {{ $status }}
    </div>
@endif
