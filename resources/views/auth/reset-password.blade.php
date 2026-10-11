{{-- Design branch: generated with Claude (AI). --}}
<x-guest-layout>
    <x-moth.heading title="Choose a new password" />

    <form method="POST" action="{{ route('password.store') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-moth.label for="email" :value="__('Email')" />
            <x-moth.input id="email" class="mt-1.5" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-moth.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-moth.label for="password" :value="__('New password')" />
            <x-moth.input id="password" class="mt-1.5" type="password" name="password" required autocomplete="new-password" />
            <x-moth.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-moth.label for="password_confirmation" :value="__('Confirm new password')" />
            <x-moth.input id="password_confirmation" class="mt-1.5" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-moth.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex justify-end pt-2">
            <x-moth.button>
                {{ __('Save new password') }}
            </x-moth.button>
        </div>
    </form>
</x-guest-layout>
