<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dream;
use App\Models\Pattern; //to allow the select of patterns when creating a new dream

class DreamController extends Controller
{
    //Adding index and detail for dreams

    public function index()
    {
        $dreams = Dream::with('patterns')->where('is_public', true)->latest('dreamt_at')->get(); 
        return view('dreams.index', [
            'dreams' => $dreams,
        ]);
    }

    public function show($dreamID)
    {
        $dream = Dream::findOrFail($dreamID);

        if (! $dream->isVisibleTo(auth()->user())) {
            abort(403);
            };

        return view('dreams.show', [
            'dreamDetails' => $dream,
        ]);

    }


        public function create()
        {
            $patterns = Pattern::orderBy('name')->get();

            return view('dreams.create', [
                'patterns' => $patterns,
            ]);
        }


        public function store(Request $request)
        {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tldr' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'dreamt_at' => ['required', 'date', 'before_or_equal:now'],
            'woke_after' => ['nullable', 'boolean'],
            'is_public' => ['nullable', 'boolean'],
            'patterns' => ['nullable', 'array'],
            'patterns.*' => ['integer', 'exists:patterns,id'],
        ]);

        $dream = Dream::create([
            'title' => $request->input('title'),
            'tldr' => $request->input('tldr'),
            'description' => $request->input('description'),
            'dreamt_at' => $request->input('dreamt_at'),
            'woke_after' => $request->boolean('woke_after'),
            'is_public' => $request->boolean('is_public'),
            'user_id' => auth()->user()->id,
        ]);

        $dream->patterns()->sync($request->input('patterns', []));

        return redirect()->route('dreams.show', $dream->id);
    }

//All of the following now check the `can change` bool. 

    public function edit($dreamID)
    {
        $dream = Dream::findOrFail($dreamID);

        if (! $dream->canChange(auth()->user())) {
            abort(403);
        }

        $patterns = Pattern::orderBy('name')->get();

        return view('dreams.edit', [
            'dreamDetails' => $dream,
            'patterns' => $patterns,
        ]);
    }

    public function update(Request $request, $dreamID)
    {
        $dream = Dream::findOrFail($dreamID);

        if (! $dream->canChange(auth()->user())) {
            abort(403);
        }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tldr' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'dreamt_at' => ['required', 'date', 'before_or_equal:now'],
            'woke_after' => ['nullable', 'boolean'],
            'is_public' => ['nullable', 'boolean'],
            'patterns' => ['nullable', 'array'],
            'patterns.*' => ['integer', 'exists:patterns,id'],
        ]);

        $dream->update([
            'title' => $request->input('title'),
            'tldr' => $request->input('tldr'),
            'description' => $request->input('description'),
            'dreamt_at' => $request->input('dreamt_at'),
            'woke_after' => $request->boolean('woke_after'),
            'is_public' => $request->boolean('is_public'),
        ]);

        $dream->patterns()->sync($request->input('patterns', []));

        return redirect()->route('dreams.show', $dream->id);
    }

    public function destroy($dreamID)
    {
        $dream = Dream::findOrFail($dreamID);

        if (! $dream->canChange(auth()->user())) {
            abort(403);
        }

        $dream->delete();

        return redirect()->route('dashboard');
    }

}
