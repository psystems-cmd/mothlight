<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Dream;


class CommentController extends Controller
{
    public function store(Request $request, $dreamID){
        $selectedDream = Dream::findOrFail($dreamID);

        if (! $selectedDream->isVisibleTo(auth()->user())) {
        abort(403);
    }
    $request->validate([
        'content' => ['required', 'string', 'max:255'],
    ]);

     $comment = Comment::create([
        'content' => $request->input('content'),
        'user_id' => auth()->user()->id,
        'dream_id' => $selectedDream->id,
    ]);

    return redirect()->route('dreams.show', $selectedDream->id);
    }
}
