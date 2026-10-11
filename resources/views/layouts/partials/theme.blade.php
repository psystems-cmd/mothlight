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
    @layer components {
        /* Each pattern carries its own colour as an inline --accent, so one
           set of rules below colours every pill, card and glow on the page. */
        .pill {
            border: 1px solid color-mix(in oklab, var(--accent) 40%, transparent);
            background-color: color-mix(in oklab, var(--accent) 8%, transparent);
            color: color-mix(in oklab, var(--accent) 80%, #EFE3D0);
            transition: all 150ms ease;
        }
        a.pill:hover {
            border-color: var(--accent);
            background-color: color-mix(in oklab, var(--accent) 18%, transparent);
            color: var(--accent);
            box-shadow: 0 0 22px color-mix(in oklab, var(--accent) 32%, transparent);
        }
        /* A pattern's card on the patterns page */
        .pattern-card-link {
            border: 1px solid color-mix(in oklab, var(--accent) 22%, transparent);
            transition: all 200ms ease;
        }
        .pattern-card-link:hover {
            border-color: color-mix(in oklab, var(--accent) 60%, transparent);
            background-color: color-mix(in oklab, var(--accent) 7%, transparent);
            box-shadow: 0 0 44px color-mix(in oklab, var(--accent) 22%, transparent);
            transform: translateY(-2px);
        }
        /* A pattern you can tick on the new/edit dream form */
        .pill-pick {
            border: 1px solid color-mix(in oklab, var(--accent) 25%, transparent);
            transition: all 150ms ease;
        }
        .pill-pick:hover { border-color: color-mix(in oklab, var(--accent) 55%, transparent); }
        .pill-pick input { accent-color: var(--accent); }
        .pill-pick:has(:checked) {
            border-color: var(--accent);
            background-color: color-mix(in oklab, var(--accent) 14%, transparent);
            color: var(--accent);
            box-shadow: 0 0 18px color-mix(in oklab, var(--accent) 25%, transparent);
        }
        .accent-text { color: var(--accent); }
        .accent-rule { background: linear-gradient(to right, transparent, var(--accent), transparent); }
        /* The soft halo behind a single pattern's title */
        .accent-aura {
            background: radial-gradient(55% 65% at 50% 0%, color-mix(in oklab, var(--accent) 42%, transparent), transparent 72%);
        }
    }
</style>

<!-- Alpine.js: used by the Breeze "delete account" pop-up on the profile page -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
