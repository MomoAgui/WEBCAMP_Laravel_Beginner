@extends('admin.layout')


@auth('admin')
@endauth

{{-- メインコンテンツ --}}
@section('contets')



        <h1>管理画面</h1>
        (アクセス傾向のグラフや警告などを表示する事が多い)<br>
@endsection