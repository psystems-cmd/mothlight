{{-- Design branch: generated with Claude (AI). --}}
@extends('layouts.public')

@section('title', $dreamDetails->title . ' · Mothlight')

@section('content')
    <article>
        <p class="flex flex-wrap items-center gap-x-3 gap-y-2 text-sm text-haze">
            {{ $dreamDetails->dreamt_at->format('l, j F Y, H:i') }}
            @if (! $dreamDetails->is_public)
                <span class="rounded-full border border-ember/40 px-2.5 py-0.5 text-xs text-ember">Private</span>
            @endif
            @if ($dreamDetails->woke_after)
                <span class="rounded-full border border-haze/30 px-2.5 py-0.5 text-xs">Woke up right after</span>
            @endif
        </p>

        <h1 class="mt-3 font-display text-4xl leading-tight tracking-tight text-dust sm:text-5xl">{{ $dreamDetails->title }}</h1>

        <p class="mt-5 max-w-prose font-display text-xl italic leading-relaxed text-lamp/90">{{ $dreamDetails->tldr }}</p>

        <div class="mt-8 max-w-prose whitespace-pre-line text-lg leading-relaxed text-dust/90">{{ $dreamDetails->description }}</div>

        @if ($dreamDetails->patterns->isNotEmpty())
            <ul class="mt-10 flex flex-wrap gap-2.5" aria-label="Patterns">
                @foreach ($dreamDetails->patterns as $currentPattern)
                    <li>
                        <a href="{{ route('patterns.show', $currentPattern->id) }}"
                           class="block rounded-full border border-lamp/30 px-4 py-1.5 text-sm text-dust hover:border-lamp hover:bg-lamp/10">
                            {{ $currentPattern->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif

        @auth
            @if ($dreamDetails->canChange(auth()->user()))
                <div class="mt-10 flex flex-wrap items-center gap-5 border-t border-dusk pt-6">
                    <a href="{{ route('dreams.edit', $dreamDetails->id) }}" class="rounded-full border border-haze/40 px-5 py-2 text-sm text-dust hover:border-dust">Edit</a>

                    <form method="POST" action="{{ route('dreams.destroy', $dreamDetails->id) }}"
                          onsubmit="return confirm('Delete this dream? This cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded-sm text-sm text-ember hover:text-dust">Delete dream</button>
                    </form>
                </div>
            @endif
        @endauth
    </article>

    <section class="mt-16" aria-labelledby="comments-heading">
        <h2 id="comments-heading" class="font-display text-2xl text-dust">Comments</h2>

        @forelse ($dreamDetails->comments as $currentComment)
            <div class="border-t border-dusk py-5 first-of-type:mt-6">
                <p class="text-sm text-haze">
                    <span class="font-medium text-dust">{{ $currentComment->user->name }}</span>
                    · {{ $currentComment->created_at->format('j F, H:i') }}
                </p>
                <p class="mt-2 max-w-prose leading-relaxed text-dust/90">{{ $currentComment->content }}</p>
            </div>
        @empty
            <p class="mt-4 text-haze">No comments yet.</p>
        @endforelse

        @auth
            <form method="POST" action="{{ route('comments.store', $dreamDetails->id) }}" class="mt-8 space-y-3">
                @csrf
                <x-moth.label for="content" value="Add a comment" />
                <x-moth.textarea id="content" name="content" rows="3">{{ old('content') }}</x-moth.textarea>
                <x-moth.error :messages="$errors->get('content')" />
                <x-moth.button>Post comment</x-moth.button>
            </form>
        @else
            <p class="mt-8 text-haze">
                <a href="{{ route('login') }}" class="rounded-sm text-sm text-haze underline decoration-haze/40 underline-offset-4 hover:text-dust hover:decoration-dust">Log in</a> to write a comment.
            </p>
        @endauth
    </section>
@endsection
