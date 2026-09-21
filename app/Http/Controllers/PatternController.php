<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index()
    {
        $patterns = Pattern::all(); //this is basically SELET * FROM patterns in SQL; givies it to the function index to use

        return view('patterns.index', [
            'patterns' => $patterns,
        ]);
    }

    public function show($patternID)
    {
        $pattern = Pattern::findOrFail($patternID);

        return view('patterns.show', [
            'patternDetails' => $pattern,
        ]);
    }


}
