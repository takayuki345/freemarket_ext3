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

Route::get('/', function () {
    return redirect('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/item/{item_id}', function () {
    return view('detail');
});


Route::middleware('auth')->group( function () {

    Route::get('/mypage', function () {
        return view('mypage');
    });

    Route::get('/mypage/profile', function () {
        return view('edit-profile');
    });

    Route::get('/sell', function () {
        return view('sell');
    });

    Route::get('/purchase/{item_id}', function () {
        return view('purchase');
    });

    Route::get('/purchase/address/{item_id}', function () {
        return view('edit-address');
    });

});

