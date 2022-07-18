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

    // 削除機能
    public function destroy($id)
    {
        $pushup = PushupResult::find($id);
        $pushup->delete();

        return redirect()->route('record');
    }
}
