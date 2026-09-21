<?php

namespace App\Http\Controllers;

use App\Models\Pattern;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index()
    {
        $patterns = Pattern::all(); //this is basically SELET * FROM patterns in SQL

        return view('patterns.index', [
            'patterns' => $patterns,
        ]);
    }
}
