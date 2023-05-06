@extends('layout')

@section('title')(詳細画面)@endsection

@section('contets')
        <h1>完了タスクの一覧</h1>
        <a href="/task/list">タスク一覧に戻る</a><br>
        <table border="1">
            <tr>
                <th>タスク名
                <th>期限
                <th>重要度
                <th>タスク終了日
 @foreach ($completed_tasks as $list)
        <tr>
            <td>{{ $list->name }}
            <td>{{ $list->period }}
            <td>{{ $list->getPriorityString() }}
            <td>{{ $list->created_at }}
@endforeach

        </table>
        <!-- ページネーション -->
        {{-- {{ $completed_tasks->links() }} --}}
       現在{{ $completed_tasks->currentPage() }}ページ目<br>
       @if ($completed_tasks->onFirstPage() === false)
        <a href="/task/list">最初のページ</a>
        @else
        最初のページ
        @endif
        /
        @if ($completed_tasks->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}">前に戻る</a>
        @else
            前に戻る
        @endif
        /
        @if ($completed_tasks->nextPageUrl() !== null)
            <a href="{{ $completed_tasks->nextPageUrl() }}">次に進む</a>
        @else
            次に進む
        @endif
        <br>


        <hr>
       <a href="/logout">ログアウト</a><br>
@endsection
