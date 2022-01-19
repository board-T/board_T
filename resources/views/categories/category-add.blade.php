@extends('layouts.app2')
@section('content')
    <form action="{{ route('add') }}" method="POST" class="add-form">
            {{ csrf_field() }}

            <!-- タスク名 -->
            <div class="form-group">
                <h1 for="task-name" class="form-groupttl">スレッド作成</h1>

                <form action="">
                    <table class="form-table">
                        <tr>
                            <th class="form-item">スレッド名</th>
                            <td class="form-body">
                                <textarea name="name" id="category-name" class="form-textarea"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th class="form-item">説明</th>
                            <td class="form-body">
                                <textarea name="comment" id="category-comment" class="form-textarea"></textarea>
                            </td>
                        </tr>
                    </table>

                    <input class="form-submit" type="submit" value="作成" />
                    <br>
                    <a href="/category"><button type="button" class="back-button">一覧画面へ戻る</button></a>

                </form>
            </div>
            @csrf
    </form>
@endsection