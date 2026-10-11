{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', 'Edit dream · Mothlight')

@section('content')
    <h1 class="font-display text-4xl tracking-tight text-dust sm:text-5xl">Edit dream</h1>
    <p class="mt-3 max-w-md text-haze">Change what you remember, or who can see it.</p>

    <x-moth.panel class="mt-10">
        <form method="POST" action="{{ route('dreams.update', $dreamDetails->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <x-moth.label for="title" value="Title" />
                <x-moth.input id="title" class="mt-1.5" type="text" name="title" value="{{ old('title', $dreamDetails->title) }}" />
                <x-moth.error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <x-moth.label for="tldr" value="TL;DR, in one line" />
                <x-moth.input id="tldr" class="mt-1.5" type="text" name="tldr" value="{{ old('tldr', $dreamDetails->tldr) }}" />
                <x-moth.error :messages="$errors->get('tldr')" class="mt-2" />
            </div>

            <div>
                <x-moth.label for="description" value="What happened?" />
                <x-moth.textarea id="description" class="mt-1.5" name="description" rows="7">{{ old('description', $dreamDetails->description) }}</x-moth.textarea>
                <x-moth.error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-moth.label for="dreamt_at" value="When did you dream it?" />
                <x-moth.input id="dreamt_at" class="mt-1.5 [color-scheme:dark] sm:w-auto" type="datetime-local" name="dreamt_at" step="1800" value="{{ old('dreamt_at', $dreamDetails->dreamt_at->format('Y-m-d\TH:i')) }}" />
                <x-moth.error :messages="$errors->get('dreamt_at')" class="mt-2" />
            </div>

            <div class="space-y-3">
                <x-moth.check name="woke_after" value="1" label="I woke up right after" :checked="old('woke_after', $dreamDetails->woke_after)" />
                <x-moth.check name="is_public" value="1" label="Share this dream publicly" :checked="old('is_public', $dreamDetails->is_public)" />
            </div>

            <fieldset>
                <legend class="text-sm font-medium text-haze">Patterns</legend>
                <div class="mt-3 flex flex-wrap gap-2.5">
                    @foreach ($patterns as $currentPattern)
                        <label class="flex cursor-pointer items-center gap-2 rounded-full border border-haze/25 px-4 py-2 text-sm text-dust has-[:checked]:border-lamp has-[:checked]:bg-lamp/10 has-[:checked]:text-lamp">
                            <input type="checkbox" name="patterns[]" value="{{ $currentPattern->id }}" class="h-3.5 w-3.5 accent-lamp"
                                   @checked(in_array($currentPattern->id, old('patterns', $dreamDetails->patterns->pluck('id')->all())))>
                            {{ $currentPattern->name }}
                        </label>
                    @endforeach
                </div>
                <x-moth.error :messages="$errors->get('patterns.*')" class="mt-2" />
            </fieldset>

            <div class="pt-2">
                <x-moth.button>Save changes</x-moth.button>
            </div>
        </form>
    </x-moth.panel>
@endsection
