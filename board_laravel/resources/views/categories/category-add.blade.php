<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style1.css">
    <title>投稿一覧画面</title>
</head>
<body >
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
                </form>
            </div>
            @csrf
    </form>
</body>
