@extends('layouts.public')

@section('title', 'Mothlight')

@section('content')
    <section class="flex min-h-[60vh] flex-col justify-center">
        <h1 class="max-w-xl font-display text-5xl leading-[1.05] tracking-tight text-dust sm:text-7xl">
            Welcome,<br>little moth.
        </h1>

        <p class="mt-6 max-w-md text-lg leading-relaxed text-haze">
            Write down last night's dream before it fades. Keep it to yourself, or share it and find out who else dreams the same.
        </p>

        <div class="mt-10 flex flex-wrap items-center gap-4">
            <a href="{{ route('register') }}"
               class="rounded-full bg-lamp px-6 py-3 font-medium text-night shadow-[0_0_32px_rgba(255,200,97,0.35)] transition hover:bg-[#FFD685] hover:shadow-[0_0_44px_rgba(255,200,97,0.55)] focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                Sign up
            </a>
            <a href="{{ route('login') }}"
               class="rounded-full border border-haze/40 px-6 py-3 font-medium text-dust transition hover:border-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
                Log in
            </a>
        </div>

        <a href="{{ route('dreams.index') }}" class="mt-8 self-start rounded-sm text-sm text-haze underline decoration-haze/40 underline-offset-4 transition hover:text-dust hover:decoration-dust focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-lamp">
            Read dreams others have shared
        </a>
    </section>
@endsection
