<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;


//テスト用
Route::get('/welcome',[WelcomeController::class,'index']);
Route::get('/welcome/second',[WelcomeController::class,'second']);

//タスク管理システム
Route::get('/',[AuthController::class,'index']);