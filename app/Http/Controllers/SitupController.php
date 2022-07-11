<?php

namespace App\Http\Controllers;

use App\Models\SitupResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SitupController extends Controller
{
    // 腹筋ページ
    public function index()
    {
        return view('menus.situp');
    }

    // SitupResult Modelと連結する
    public function store(Request $request)
    {
        // SitupResultのインスタンス化
        $situp = new SitupResult();
        // データ入力
        $situp->fill([
            'user_id' => Auth::user()->id,
            'situp_result' => $request->situp_result,
        ])->save();

        return redirect()->route('record');
    }
}
