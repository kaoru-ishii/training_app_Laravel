<?php

namespace App\Http\Controllers;

use App\Models\PushupResult;
use App\Models\SquatResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class SquatController extends Controller
{
    // スクワットページ
    public function index()
    {
        return view('menus.squat');
    }

    // SquatResult Modelと連結する
    public function store(Request $request)
    {
        // SquatResultのインスタンス化
        $squat = new SquatResult();
        // データ入力
        $squat->fill([
            'user_id' => Auth::user()->id,
            'squat_result' => $request->squat_result,
        ])->save();

        return redirect()->route('record');
    }
}
