<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Hash;


class UserController extends Controller
{
    /**
     * 登録画面 を表示する
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user./register');
    }
    /**
     * 入力値を受け取る
     *
     * */

     public function register(UserRegisterPost $request){

          // validate済

        // データの取得

        $datum=$request->validated();

         $datum['password'] = Hash::make($datum['password']);

        return view('user./input',['datum'=>$datum]);

        // 認証
        if (Auth::attempt($datum) === false) {
            return back()
                   ->withInput() // 入力値の保持
                   ->withErrors(['auth' => 'emailかパスワードに誤りがあります。',]) // エラーメッセージの出力
                   ;
        }

        //
        $request->session()->regenerate();
        return redirect()->intended('/');
}
}