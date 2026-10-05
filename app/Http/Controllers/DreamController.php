<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dream;

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

        return view('dreams.show', [
            'dreamDetails' => $dream,
        ]);
    }
}
