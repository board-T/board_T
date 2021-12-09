<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class likeController extends Controller
{
    public function store(Comment $comment)
    {
        $comment->users()->attach(Auth::id());

        return redirect()->route('comments.index');
    }



public function destroy(Comment $comment)
    {
        $comment->users()->detach(Auth::id());

        return redirect()->route('comments.index');
    }
}
