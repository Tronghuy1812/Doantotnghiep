<?php

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

Route::prefix('user')->middleware('checkLoginUser')->group(function() {
    Route::get('/', 'UserController@index');
    Route::prefix('cart')->group(function (){
        Route::get('{id}/{type}/add', 'UserShoppingCartController@processCart')->name('get_user.cart.add');
    });
});
