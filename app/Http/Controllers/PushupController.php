<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PushupResult;

class PushupController extends Controller
{
    // メニューに遷移
    public function index()
    {
        return view('menus.pushup');
    }

    // PushupResult Modelと連結する
    public function store(Request $request)
    {
        // PushupResultのインスタンス化
        $pushup = new PushupResult();
        // データ入力
        $pushup->fill([
            'user_id' => Auth::user()->id,
            'pushup_result' => $request->pushup_result,
        ])->save();

        return redirect()->route('record');
    }

    // 削除機能④
    public function destroy($id)
    {
        $pushup = PushupResult::find($id);
        $pushup->delete();

        return redirect()->route('record');
    }

    // 削除機能③
    // public function delete(Request $request, $id)
    // {
    //     $inputs = $request->all();
    //     PushupResult::where('id', $id)->delete();

    //     return redirect()->route('record');
    // }

    // 削除機能②
    // public function exeDelete($id)
    // {
    //     if (empty($id)) {
    //         \App\Models\PushupResult::flash('err_msg', 'データがありません。');
    //         return redirect(route('pushup_results'));
    //     }
    //     try {
    //         PushupResult::destroy($id);
    //     } catch(\Throwable $e) {
    //         abort(500);
    //     }

    // }
    
    // 削除機能①
    //     public function destroy(Pushup $pushup_delete)
    //     {
    //         $pushup_delete->delete();
    //         return redirect()->route('record')->with('message', '投稿を削除しました');
    //         // PushupResult::where('id', $id)->delete();
    //         // $PushupController = new PushupResult();
    //         // return $PushupController->index();
    //     }
}
