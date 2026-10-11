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
        $dreams = Dream::where('is_public', true)->get(); 
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
}
