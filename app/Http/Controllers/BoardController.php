<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Board;

class BoardController extends Controller
{
    /**
     * スレッド一覧
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $authusers = Auth::id();

        $boards = Board::orderBy('created_at','asc')->get();
        return view('boards.index', [
            'boards' => $boards,
            'authusers' => $authusers

        ]);
    }
}
