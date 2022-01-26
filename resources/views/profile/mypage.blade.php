@extends('layouts.app2')
 
@section('content')

        <div class="mypage">
            <input type="hidden" name="id" value="{{ $users->id }}">

                <div class="icon">
                @if(!empty($users->image_name)) 
                    <img src="{!! asset('images/' .$users->image_name)!!}" alt="" width="100%">
                @else
                    <img src="{!! asset('images/default-icon.jpg')!!}" alt="" width="100%">
                @endif
                </div>
                <div class="name">{{ $users->name }}</div>
                <div class="profile">{{ $users->profile }}</div>

            <!-- <a href="/edit?id={{ $users->id }}"> -->
            <a href="{{ route('edit',['id' => $users->id ]) }}">

                <img src="../../images/edit.png" alt="" >
            </a>

        </div>


@endsection