@extends('admin.layout')

@auth('admin')
@endauth

{{-- メインコンテンツ --}}
@section('contets')


        <h1>ユーザー一覧</h1>
        <table border="1">
            <tr>
                <th>ユーザーID
                <th>ユーザー名
                <th>タスク件数
        @foreach($users as $user)
            <tr>
                <th>{{ $user->id }}
                <th>{{ $user->name }}
                <th>{{ $user->task_num }}
        @endforeach
           </table>
 @endsection