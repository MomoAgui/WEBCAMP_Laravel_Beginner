@extends('layout')

@section('title')(詳細画面)@endsection

@section('contets')
        <h1>完了タスクの一覧</h1>
        <a href="/task/list">タスク一覧に戻る</a><br>
        <table border="1">
            <tr>
                <td>タスク名
                <td>期限
                <td>重要度
                <td>タスク終了日
 @foreach ($completed_tasks as $list)
        <tr>
            <td>{{ $list->name }}
            <td>{{ $list->period }}
            <td>{{ $list->getPriorityString() }}
            <td>{{ $list->created_at }}
@endforeach

        </table>


        <hr>
       <a href="/logout">ログアウト</a><br>
@endsection
