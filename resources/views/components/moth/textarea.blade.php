{{-- Design branch: generated with Claude (AI). --}}
@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes->merge(['class' => 'block w-full rounded-xl border border-haze/25 bg-night/60 px-4 py-3 text-dust leading-relaxed placeholder:text-haze/50 transition focus:border-lamp focus:outline-none focus:ring-2 focus:ring-lamp/30']) }}>{{ $slot }}</textarea>
