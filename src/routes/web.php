<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
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

Route::get('/', [ItemController::class, 'index']);

Route::get('/item/{item_id}', [ItemController::class, 'show']);

Route::middleware('auth')->group( function () {

    Route::get('/mypage', [ItemController::class, 'mypage']);

    Route::get('/mypage/profile', [UserController::class, 'edit']);

    Route::post('/mypage/profile', [UserController::class, 'update']);

    Route::get('/item/{item_id}/like', [ItemController::class, 'like']);

    Route::post('/item/comment', [CommentController::class, 'store']);
    Route::get('/sell', [ItemController::class, 'create']);

    Route::post('/sell', [ItemController::class, 'store']);

    Route::get('/purchase/{item_id}', [ItemController::class, 'prePurchase']);

    Route::post('/purchase/{item_id}', [ItemController::class, 'purchase']);

    Route::get('/purchase/address/{item_id}', [ItemController::class, 'tempEdit']);

    Route::post('/purchase/address/{item_id}', [ItemController::class, 'tempUpdate']);

});

