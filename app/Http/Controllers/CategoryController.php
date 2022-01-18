<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{

    //middlewareによる認証制限を追加
    public function __construct()
    {
        $this->middleware('auth');
    }

    //投稿画面一覧
    public function category(Request $request)
    {
        $users = Auth::id();
        // var_dump(Auth::user()->id);
        // $users = Auth::user('id', $request["id"]);

        $categories = Category::all();
        return view('categories.category', [
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    //スレッド作成画面

    public function category_add(Request $request)
    {
        $categories = Category::all();
        return view('categories.category-add', [
            'categories' => $categories,
        ]);
    }

    //スレッド作成画面から投稿画面へ
    
    public function add(Request $request)
    {
        $category = new Category;
        // $category->id = $request['id'];
        $category->name = $request['name'];
        $category->comment = $request['comment'];
        $category->save();
        $categories = Category::all();
        
        return view('categories.category', [
            'categories' => $categories,
        ]);
    }


}
