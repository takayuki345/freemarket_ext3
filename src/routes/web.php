<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/mypage/profile', [UserController::class, 'edit']);

Route::post('/mypage/profile', [UserController::class, 'update']);

Route::get('/', [ItemController::class, 'index']);

Route::get('/item/{item_id}', [ItemController::class, 'show']);

Route::post('/item/comment', [CommentController::class, 'store']);

Route::middleware('verified')->group( function () {

    Route::middleware('auth')->group( function () {

        Route::get('/mypage', [ItemController::class, 'mypage']);

        Route::get('/item/{item_id}/like', [ItemController::class, 'like']);

        Route::get('/sell', [ItemController::class, 'create']);

        Route::post('/sell', [ItemController::class, 'store']);

        Route::get('/purchase/{item_id}', [ItemController::class, 'prePurchase']);

        Route::post('/purchase/{item_id}', [ItemController::class, 'purchase']);

        Route::get('/purchase/{item_id}/success', [ItemController::class, 'success']);

        Route::get('/purchase/address/{item_id}', [ItemController::class, 'tempEdit']);

        Route::post('/purchase/address/{item_id}', [ItemController::class, 'tempUpdate']);

    });

});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');