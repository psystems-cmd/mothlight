{{-- Design branch: generated with Claude (AI). --}}
{{-- Fonts, Tailwind and the Mothlight colours. Shared by the public and the guest (login/register) layout. --}}
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=fraunces:400,400i,600|figtree:400,500,600&display=swap" rel="stylesheet">

<!-- Tailwind via CDN, same as layouts/app.blade.php -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<!-- Mothlight colours and fonts, usable as Tailwind classes (bg-night, text-lamp, font-display, ...) -->
<style type="text/tailwindcss">
    @theme {
        --color-night: #160E2C;
        --color-dusk: #2E1D52;
        --color-haze: #B8A6E3;
        --color-dust: #EFE3D0;
        --color-lamp: #FFC861;
        --color-ember: #F0783C;
        --font-display: "Fraunces", Georgia, serif;
        --font-sans: "Figtree", ui-sans-serif, system-ui, sans-serif;
    }
    @layer base {
        a { @apply transition; }
        :focus-visible { @apply outline-2 outline-offset-4 outline-lamp; }
    }
</style>

<!-- Alpine.js: used by the Breeze "delete account" pop-up on the profile page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
