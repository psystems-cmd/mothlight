{{-- Design branch: generated with Claude (AI). --}}
<x-guest-layout>
    <x-moth.heading title="Forgot your password?">
        Enter your email address and we'll send you a link to choose a new one.
    </x-moth.heading>

    <!-- Session Status -->
    <x-moth.status class="mt-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-moth.label for="email" :value="__('Email')" />
            <x-moth.input id="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autofocus />
            <x-moth.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <x-moth.link href="{{ route('login') }}">
                {{ __('Back to log in') }}
            </x-moth.link>

            <x-moth.button>
                {{ __('Send reset link') }}
            </x-moth.button>
        </div>
    </form>
</x-guest-layout>
