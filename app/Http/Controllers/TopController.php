<?php

namespace App\Http\Controllers;

use App\Models\PushupResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //メニュー一覧
    public function index()
    {
        return view('menus.top');
    }

}
