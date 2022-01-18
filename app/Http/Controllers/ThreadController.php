<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;


class ThreadController extends Controller
{
    // Indexページの表示
    public function index(Request $request)
    {
        $users = Auth::id();

        $category = Category::find($request->id); 
        $comments = $category->comments()->get(); 


        return view('threads.index',[
            'category_id'=>$request->id,
            'category'=>$category,
            'comments'=>$comments,
            'users' => $users,

        ]);
    }

    // 投稿された内容を表示するページ
    public function create(Request $request)
    {
        $users = Auth::id();

        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:10',
            'comment' => 'required|min:1|max:100',
        ]);
        // 投稿内容を受け取って変数に入れる
        $name = $request->input('name');
        $comment = $request->input('comment');

        Comment::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'comment' => $comment,
            'users' => $users,

        ]);

        return redirect()->route('threads', ['id' => $request->category_id]);
    }
}


