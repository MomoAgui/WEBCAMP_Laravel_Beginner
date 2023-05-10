<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User as UserModel;

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

        // テーブルにINSERT

             DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            $datum['password']=>Hash::make($datum['password'])
        ])->save();


        // ユーザー登録成功
        $request->session()->flash('front.user_register_success', true);

          return redirect('views./index');

    }

}
