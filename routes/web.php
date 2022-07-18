<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// tecpitから参照
Route::group(['middleware' => ['auth']], function() {
    Route::get('/pushup', [PushupCountroller::class, 'create'])->name('pushup.create');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/top', [App\Http\Controllers\TopController::class, 'index'])->name('top');

Route::get('/pushup', [App\Http\Controllers\PushupController::class, 'index'])->name('pushup');

Route::get('/situp', [App\Http\Controllers\SitupController::class, 'index'])->name('situp');

Route::get('/squat', [App\Http\Controllers\SquatController::class, 'index'])->name('squat');

Route::get('/record', [App\Http\Controllers\RecordController::class, 'index'])->name('record');

Route::get('/finish', [App\Http\Controllers\FinishController::class, 'index'])->name('finish');

Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/pushupresult', [App\Http\Controllers\PushupController::class, 'store'])->name('pushupresult');

Route::post('/situpresult', [App\Http\Controllers\SitupController::class, 'store'])->name('situpresult');

Route::post('/squatresult', [App\Http\Controllers\SquatController::class, 'store'])->name('squatresult');

// データ削除
Route::post('pushup/destroy{id}', [App\Http\Controllers\PushupController::class, 'destroy'])->name('pushup.destroy');

Route::post('situp/destroy{id}', [App\Http\Controllers\SitupController::class, 'destroy'])->name('situp.destroy');

Route::post('squat/destroy{id}', [App\Http\Controllers\SquatController::class, 'destroy'])->name('squat.destroy');

