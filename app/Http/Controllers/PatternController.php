<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index()
    {
        //Claude:: count only the public dreams, so a private dream never shows up in a total
        $patterns = Pattern::withCount(['dreams' => function ($query) {
            $query->where('is_public', true);
        }])->orderBy('name')->get();

        return view('patterns.index', [
            'patterns' => $patterns,
        ]);
    }

    public function show($patternID)
    {
        $pattern = Pattern::findOrFail($patternID);
        $dreams = $pattern->dreams()->with('patterns')->where('is_public', true)->latest('dreamt_at')->get();

        return view('patterns.show', [
            'patternDetails' => $pattern,
            'dreams' => $dreams,
        ]);
    }
    
}
