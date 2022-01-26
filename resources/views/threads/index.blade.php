@extends('layouts.app2')
 
@section('content')
<div class="thread-frame">
    <div class="thread-title">{{ $category->name }}</div>
    @foreach ($comments as $comment)
    <div class="thread-comment-box">
        <div>
            <span class="thread-comment-id">{{ $comment->id }}.</span>
            <span class="thread-comment-name">{{ $comment->user->name }}</span>
            <span class="thread-comment-date">{{ $comment->created_at->format('Y.m.d') }}</span>
        </div>
        <div class="thread-comment-body">
        {!! nl2br(e(Str::limit($comment->comment, 1000))) !!}
        </div>
        <div class="thread-like-box">
        @if($comment->users()->where('user_id', Auth::id())->exists())
            <div class="col-md-3">
                <form action="{{ route('unlikes', $comment) }}" method="Post">
                    @csrf
                    <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                </form>
            </div>
        @else
            <div class="col-md-3">
                <form action="{{ route('likes', $comment) }}" method="Post">
                    @csrf
                    <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                </form>
            </div>
        @endif
            <div class="thread-like-count">
                <p>いいね数：{{ $comment->users()->count() }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
    @if($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="comment-form">
        <form action="/threads" method="POST">
        <input type="hidden" name="category_id" value="{{ $category_id }}">
            <br>
            <tr>
                <th>名前</th>
                <td class="comment-name">
                    <input name="name" id="category-name" class="form-textarea"></textarea>
                </td>
                <br>
                <th>コメント:</th>
                <td class="comment-body">
                    <textarea class="comment-text" name="comment" rows="2" cols="40"></textarea>
                </td>
            </tr>
            {{ csrf_field() }}
            <br>
            <br><button class="btn btn-submit"> コメント </button>
        </form>
    </div>
</div>
<a href="/category"><button type="button" class="back-button">一覧画面へ戻る111</button></a>
@endsection


 
