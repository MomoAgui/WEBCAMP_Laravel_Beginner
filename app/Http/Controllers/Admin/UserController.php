<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User as UserModel;

class UserController extends Controller
{
    /**
     * ユーザの一覧 を表示する
     *
     * @return \Illuminate\View\View
     */
   public function list()
    {
        // データの取得
        $list = UserModel::get();
echo "<pre>\n";
var_dump($list->toArray()); exit;

    //return view('admin.user.list');
    }

}