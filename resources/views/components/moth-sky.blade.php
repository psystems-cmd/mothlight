{{--
    Background for every public page: a glowing lamp with moths circling it.
    Each moth has three layers:
      .moth        turns around the lamp (orbit)
      .moth-drift  moves closer to the lamp and away again
      .moth-wings  flaps the wings
    The numbers per moth (angle, speed, distance) are set with CSS variables in its style attribute.
    People who turned on "reduce motion" in their system settings get still moths instead.
--}}
@php
    // angle, orbit time, far + near distance from the lamp, drift time, size, direction
    $moths = [
        ['a' => '10deg',  'orbit' => '34s', 'far' => '260px', 'near' => '46px', 'drift' => '9s',  'size' => '28px', 'dir' => 'normal'],
        ['a' => '80deg',  'orbit' => '27s', 'far' => '180px', 'near' => '30px', 'drift' => '6s',  'size' => '21px', 'dir' => 'reverse'],
        ['a' => '150deg', 'orbit' => '41s', 'far' => '340px', 'near' => '70px', 'drift' => '11s', 'size' => '34px', 'dir' => 'normal'],
        ['a' => '210deg', 'orbit' => '23s', 'far' => '140px', 'near' => '24px', 'drift' => '5s',  'size' => '17px', 'dir' => 'reverse'],
        ['a' => '275deg', 'orbit' => '38s', 'far' => '300px', 'near' => '56px', 'drift' => '8s',  'size' => '25px', 'dir' => 'normal'],
        ['a' => '320deg', 'orbit' => '30s', 'far' => '220px', 'near' => '36px', 'drift' => '7s',  'size' => '20px', 'dir' => 'reverse'],
    ];
@endphp

<div class="pointer-events-none fixed inset-0 z-0 overflow-hidden" aria-hidden="true">

    {{-- a violet haze in the lower left, so the page isn't flat --}}
    <div class="absolute -bottom-[30vmax] -left-[25vmax] h-[70vmax] w-[70vmax] rounded-full bg-[radial-gradient(circle,rgba(120,78,205,0.42),rgba(22,14,44,0)_65%)]"></div>

    {{-- the lamp: everything inside is positioned around this single point --}}
    <div class="lamp absolute">
        <div class="absolute h-[64vmax] w-[64vmax] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[radial-gradient(circle,rgba(255,200,97,0.42),rgba(240,120,60,0.24)_26%,rgba(110,72,190,0.10)_46%,rgba(22,14,44,0)_64%)]"></div>
        <div class="absolute h-3.5 w-3.5 -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#FFF3D6] shadow-[0_0_24px_8px_#FFC861,0_0_90px_36px_rgba(240,120,60,0.45)]"></div>

        @foreach ($moths as $index => $moth)
            <div class="moth"
                 style="--a: {{ $moth['a'] }}; --orbit: {{ $moth['orbit'] }}; --far: {{ $moth['far'] }}; --near: {{ $moth['near'] }}; --drift: {{ $moth['drift'] }}; --size: {{ $moth['size'] }}; --dir: {{ $moth['dir'] }}; --delay: -{{ $index * 4 }}s;">
                <div class="moth-drift">
                    <svg viewBox="-10 -8 20 16" class="moth-svg">
                        <g class="moth-wings">
                            <path d="M0 -1 C-3 -8 -9 -7 -9.5 -3 C-10 0 -5 1 0 0 Z M0 -1 C3 -8 9 -7 9.5 -3 C10 0 5 1 0 0 Z"/>
                            <path opacity="0.75" d="M0 0 C-3 1 -7 3 -6 6 C-5 8 -2 5 0 1 Z M0 0 C3 1 7 3 6 6 C5 8 2 5 0 1 Z"/>
                        </g>
                        <ellipse cx="0" cy="0.5" rx="0.9" ry="3.6" fill="#8C6A4A"/>
                    </svg>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .lamp {
        top: clamp(120px, 22vh, 220px);
        right: clamp(48px, 12vw, 220px);
    }

    .moth {
        position: absolute;
        transform: rotate(var(--a));
        animation: moth-orbit var(--orbit) linear var(--delay) infinite var(--dir);
    }

    .moth-drift {
        transform: translateX(var(--far));
        animation: moth-drift var(--drift) ease-in-out var(--delay) infinite alternate;
    }

    .moth-svg {
        width: var(--size);
        height: var(--size);
        margin: calc(var(--size) / -2) 0 0 calc(var(--size) / -2);
        fill: #EFE3D0;
        opacity: 0.9;
        filter: drop-shadow(0 0 6px rgba(255, 200, 97, 0.55));
    }

    .moth-wings {
        transform-box: fill-box;
        transform-origin: center;
        animation: moth-flap 0.22s ease-in-out infinite alternate;
    }

    @keyframes moth-orbit {
        from { transform: rotate(var(--a)); }
        to   { transform: rotate(calc(var(--a) + 360deg)); }
    }

    @keyframes moth-drift {
        from { transform: translateX(var(--far)); }
        to   { transform: translateX(var(--near)); }
    }

    @keyframes moth-flap {
        from { transform: scaleX(1); }
        to   { transform: scaleX(0.35); }
    }

    @media (prefers-reduced-motion: reduce) {
        .moth, .moth-drift, .moth-wings { animation: none; }
    }
</style>
