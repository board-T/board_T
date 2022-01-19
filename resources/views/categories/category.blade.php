
@extends('layouts.app')
@section('content')
@if (count($categories) > 0)

    <form action="category.blade.php" method="get" >
        <div class="search">
            <input type="text" class="textbox" placeholder="キーワード" name="keyword" value="" style="width: 200px;" >
            <button class="btn-k" type="submit" >検索</button>
        </div>
    </form>


    @foreach ($categories as $category)
        <div class="link_box">
            <a href="{{ route('threads', ['id' => $category->id ]) }}" class="title">{{ $category->name }}</a><br>
            <span class="ex"> {{ $category->comment }}</span>
        </div>

    @endforeach

    {{ $categories->links() }}

@endif
    <div class="mt-4 mb-4">
        <a href="{{ route('category-add') }}" class="btn btn-primary">
            新しい部屋の作成
        </a>
    </div>
@endsection
