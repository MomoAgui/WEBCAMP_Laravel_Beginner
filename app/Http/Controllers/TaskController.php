<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Requests\TaskRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Task as TaskModel;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
       /**
     * タスク一覧ページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        return view('task.list');
}
}