{{-- Design branch: generated with Claude (AI). --}}
<x-guest-layout>
    <x-moth.heading title="Check your inbox">
        We sent you an email with a link. Click it to confirm your address, then come back here. No email? We can send a new one.
    </x-moth.heading>

    @if (session('status') == 'verification-link-sent')
        <x-moth.status class="mt-6" :status="__('A new link is on its way to the email address you signed up with.')" />
    @endif

    <div class="mt-8 flex flex-wrap items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-moth.button>
                {{ __('Send a new link') }}
            </x-moth.button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="rounded-sm text-sm text-haze underline decoration-haze/40 underline-offset-4 transition hover:text-dust hover:decoration-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                {{ __('Log out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
