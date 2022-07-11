<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PushupResult;
use App\Models\SitupResult;
use App\Models\SquatResult;
use Illuminate\Support\Facades\DB;


class RecordController extends Controller
{
    // 総合記録

    public function index()
    {
        $user = \Auth::user();
        // 直近の記録
        $pushupresults = PushupResult::orderBy('created_at', 'desc')
        ->where('user_id', $user['id'])
        ->first();

        $situpresults = SitupResult::orderBy('created_at', 'desc')
        ->where('user_id', $user['id'])
        ->first();

        $squatresults = SquatResult::orderBy('created_at', 'desc')
        ->where('user_id', $user['id'])
        ->first();

        // 本日の合計記録
        $pushupresults_sum_day = DB::table('pushup_results')
        ->selectRaw('DATE_FORMAT(updated_at, "%Y%m%d") AS date')
        ->selectRaw('sum(pushup_result) AS total_pushup_result')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->where('user_id', $user['id'])
        ->first();

        $situpresults_sum_day = DB::table('situp_results')
        ->selectRaw('DATE_FORMAT(updated_at, "%Y%m%d") AS date')
        ->selectRaw('sum(situp_result) AS total_situp_result')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->where('user_id', $user['id'])
        ->first();

        $squatresults_sum_day = DB::table('squat_results')
        ->selectRaw('DATE_FORMAT(updated_at, "%Y%m%d") AS date')
        ->selectRaw('sum(squat_result) AS total_squat_result')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->where('user_id', $user['id'])
        ->first();

        
        // 例②
        // $pushupresults_sum_day = DB::table('pushup_results')
        // // ->where('user_id', $user['id'])
        // ->groupBy('updated_at')
        // ->having('pushup_result')
        // ->sum('pushup_result');

        // 例③
        // $pushupresults_sum_day = DB::table('users', 'pushup_results')
        // ->select('pushup_result')
        // ->groupBy('user_id', 'update_at %Y-%m-%d')
        // ->sum('pushup_result');
        // dd($situpresults_sum_day);


        // 過去最高記録
        $pushupresults_max = PushupResult::where('pushup_result', PushupResult::max('pushup_result'))
        ->where('user_id', $user['id'])
        ->first();

        $situpresults_max = SitupResult::where('situp_result', SitupResult::max('situp_result'))
        ->where('user_id', $user['id'])
        ->first();

        $squatresults_max = SquatResult::where('squat_result', SquatResult::max('squat_result'))
        ->where('user_id', $user['id'])
        ->first();

        // 過去合計記録
        $pushupresults_sum = DB::table('pushup_results')->where('user_id', $user['id'])
        ->sum('pushup_result');

        $situpresults_sum = DB::table('situp_results')->where('user_id',$user['id'])
        ->sum('situp_result');

        $squatresults_sum = DB::table('squat_results')->where('user_id', $user['id'])
        ->sum('squat_result');


        return view('menus.record', compact(
            'pushupresults',
            'situpresults',
            'squatresults',
            'pushupresults_max',
            'situpresults_max',
            'squatresults_max',
            'pushupresults_sum',
            'situpresults_sum',
            'squatresults_sum',
            'pushupresults_sum_day',
            'situpresults_sum_day',
            'squatresults_sum_day'
        ));        
    }



    
}