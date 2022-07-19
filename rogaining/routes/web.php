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
use App\Http\Controllers\RogainingController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PreviewController;

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/develop', function () {
    return view('develop');
});

Route::get('/developing',  function () {
    return view('developing');
});

//ロゲイニング一覧
Route::get('/rogaining_list', [RogainingController::class, 'list']);
Route::post('/rogaining_list', [RogainingController::class, 'list']);

//ロゲイニング追加
Route::post('/rogaining_add', [RogainingController::class, 'add']);

Route::post('/rogaining_insert', [RogainingController::class, 'insert']);

//ロゲイニング編集
Route::get('/rogaining_edit', [RogainingController::class, 'edit']);
Route::post('/rogaining_edit', [RogainingController::class, 'edit']);

//ロゲイニング保存
Route::post('/rogaining_update', [RogainingController::class, 'update']);

//ポイント追加
Route::post('/point_add', [PointController::class, 'add']);
Route::post('/point_insert', [PointController::class, 'insert']);
//ポイント編集
Route::post('/point_edit', [PointController::class, 'edit']);
Route::get('/point_edit',[PointController::class, 'edit']);
//ポイント編集保存
Route::post('/point_update', [PointController::class, 'update']);

//プレビュー
Route::get('/preview',[PreviewController::class, 'show']);
