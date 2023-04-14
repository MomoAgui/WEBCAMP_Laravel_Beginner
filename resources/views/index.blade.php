@extends('layout')

@section('contents')
    
        <h1>ログイン</h1>
        <form action="/login" method="post">
            email:<input name="email"><br>
            パスワード:<input name="ps" type="password"><br>
            <button>ログインする</button>
        </form>
@endsection('contents')        
        