@extends('layouts.app2')
 
@section('content')

        <div class="mypage">
            <input type="hidden" name="id" value="{{ $users->id }}">

                <div class="icon">
                    <!-- <img src="public/storage/images/tmp/{{ $users->image_name }}" alt=""> -->
                    <!-- <img src="{{ asset('storage/images/default_icon.png')}}" alt=""> -->
                    <img src="{!! asset('images/' .$users->image_name)!!}" alt="" width="100%">

                </div>
                <div class="name">{{ $users->name }}</div>
                <div class="profile">{{ $users->profile }}</div>

            <!-- <a href="/edit?id={{ $users->id }}"> -->
            <a href="{{ route('edit',['id' => $users->id ]) }}">

                <img src="../../images/edit.png" alt="" >
            </a>

        </div>


@endsection