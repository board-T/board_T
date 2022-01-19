<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller

{

    //middlewareによる認証制限を追加
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    //投稿画面一覧

    public function mypage(Request $request)
    {

        $authusers = Auth::id();
        $users = User::where('id', $request["id"])
        ->first();


        return view('profile.mypage', [
            'users' => $users,
            'authusers' => $authusers
        ]);
    }

    public function edit(Request $request)
    {
        $authusers = Auth::id();


            $user = User::where('id', $request["id"])
                ->first();
            $users = User::all();


        
        return view('profile.edit', [
            'user' => $user,
            'users' => $users,
            'authusers' => $authusers

        ]);
    }

    public function koushin(Request $request)
    {

        $authusers = Auth::id();

        $file = User::Where($request['image_name']);
        var_dump($request->image_name);
        
        if ($file = $request->image_name) {
            $orgfilename = $file->getClientOriginalName();
           $ext = pathinfo($orgfilename, PATHINFO_EXTENSION);
           $ext2 = pathinfo($orgfilename, PATHINFO_FILENAME);

            $img_url = $file->storeAs('', $ext2.".".$ext,'public');

        } elseif($file = "NULL") {
            $fileName = "default.icon";

        }



        //DB更新処理      
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->profile = $request['profile'];
        $user->image_name = $request['image_name'];
        $user->image_name = $img_url;
        $user->save();
        $users = User::where('id', $request["id"])
        ->first();


        return redirect('profile.mypage');

    }


}
