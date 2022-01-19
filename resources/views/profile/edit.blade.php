@extends('layouts.app2')
 
@section('content')

<div class="">


    <!-- プロフィール編集画面 -->
    <form action="{{ route('koushin') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      

        <div class="mypage">
                    <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="icon">
            <img src="{!! asset('storage/upload/' .$user->image_name)!!}" alt="">
            </div>
            <div class="form-file">
                <label for="user-image_name" class="">ファイルを選択</label>
                <input type="file" name="image_name" id="user-image_name" class="form-filetext" value='ファイルを選択'>
            </div>
            <div class="form-text">
                <input type="text" name="name" id="user-name"  placeholder='ニックネーム' value="{{ $user->name }}">
            </div>
            <div class="form-text">
                <input type="text" name="profile" id="user-profile"  placeholder='自己紹介文' value="{{ $user->profile }}" wordwrap="soft">
            </div>
            <div>
                <!-- 更新ボタン -->
                <input type="submit" value="更新" class="btn">
            </div> 


        </div>
        ​
        @csrf

    </form>
</div>
@endsection