{{-- Design branch: generated with Claude (AI). --}}
<x-guest-layout>
    <x-moth.heading title="Join Mothlight">
        Keep a private dream journal, and share the dreams you want to.
    </x-moth.heading>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-moth.label for="name" :value="__('Name')" />
            <x-moth.input id="name" class="mt-1.5" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-moth.error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-moth.label for="email" :value="__('Email')" />
            <x-moth.input id="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-moth.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-moth.label for="password" :value="__('Password')" />
            <x-moth.input id="password" class="mt-1.5" type="password" name="password" required autocomplete="new-password" />
            <x-moth.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-moth.label for="password_confirmation" :value="__('Confirm password')" />
            <x-moth.input id="password_confirmation" class="mt-1.5" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-moth.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            <x-moth.link href="{{ route('login') }}">
                {{ __('Already have an account?') }}
            </x-moth.link>

            <x-moth.button>
                {{ __('Sign up') }}
            </x-moth.button>
        </div>
    </form>
</x-guest-layout>
