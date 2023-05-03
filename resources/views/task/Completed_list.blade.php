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
@foreach ($list as $task)
        <tr>
            <td>{{ $task->name }}  //タスク名
            <td>{{ $task->period }}　　　//期限
            <td>{{ $task->getPriorityString() }}　　　//重要度
        　  <td>{{ $task->created_at }}

@endforeach
        </table>
         <!-- ページネーション -->
        {{-- {{ $list->links() }} --}}
        現在 {{ $list->currentPage() }} ページ目<br>
        @if ($list->onFirstPage() === false)
        <a href="/task/list">最初のページ</a>
        @else
        最初のページ
        @endif
        /
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">前に戻る</a>
        @else
            前に戻る
        @endif
        /
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}">次に進む</a>
        @else
            次に進む
        @endif
        <br>


        <hr>
       <a href="/logout">ログアウト</a><br>
@endsection
