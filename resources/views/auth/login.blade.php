{{-- Design branch: generated with Claude (AI). --}}
<x-guest-layout>
    <x-moth.heading title="Welcome back">
        Log in to read and write your dreams.
    </x-moth.heading>

    <!-- Session Status -->
    <x-moth.status class="mt-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-moth.label for="email" :value="__('Email')" />
            <x-moth.input id="email" class="mt-1.5" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-moth.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-moth.label for="password" :value="__('Password')" />
            <x-moth.input id="password" class="mt-1.5" type="password" name="password" required autocomplete="current-password" />
            <x-moth.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="flex items-center gap-2.5 text-sm text-haze">
            <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 accent-lamp">
            {{ __('Remember me') }}
        </label>

        <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
            @if (Route::has('password.request'))
                <x-moth.link href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </x-moth.link>
            @endif

            <x-moth.button>
                {{ __('Log in') }}
            </x-moth.button>
        </div>
    </form>

    <p class="mt-8 border-t border-haze/15 pt-6 text-sm text-haze">
        New here?
        <x-moth.link href="{{ route('register') }}">Sign up</x-moth.link>
    </p>
</x-guest-layout>
