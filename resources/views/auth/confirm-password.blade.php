{{-- Design branch: generated with Claude (AI). --}}
<x-guest-layout>
    <x-moth.heading title="Confirm your password">
        This part of Mothlight needs your password once more before you continue.
    </x-moth.heading>

    <form method="POST" action="{{ route('password.confirm') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Password -->
        <div>
            <x-moth.label for="password" :value="__('Password')" />
            <x-moth.input id="password" class="mt-1.5" type="password" name="password" required autocomplete="current-password" />
            <x-moth.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end pt-2">
            <x-moth.button>
                {{ __('Confirm') }}
            </x-moth.button>
        </div>
    </form>
</x-guest-layout>
