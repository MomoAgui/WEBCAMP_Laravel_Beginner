<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CompletedTask as CompletedTaskModel;

class CompletedTaskController extends Controller
{
    /**
     * 完了タスク一覧 を表示する
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $list=CompletedTaskModel::get();  //完了したテーブル全レコードを取得
        return view('task.Completed_list',['list'=>$list]);
    }
    /**
     * 「単一のタスク」Modelの取得
     */
    protected function getCompletedTaskModel($task_id)
    {
        // task_idのレコードを取得する
        $task = CompetedTaskModel::find($task_id);
        if ($task === null) {
            return null;
        }
        // 本人以外のタスクならNGとする
        if ($task->user_id !== Auth::id()) {
            return null;
        }
        //
        return $task;
    }

    /**
     * 「単一のタスク」の表示
     */
    protected function singleListRender($task_id, $template_name)
    {
        // task_idのレコードを取得する
        $task = $this->getCompletedTaskModel($task_id);
        if ($task === null) {
            return redirect('/completed_tasks/list');
        }

        // テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['completed_tasks' => $task]);
    }


    /**
     * ログアウト処理
     *
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('front.index'));
    }
}