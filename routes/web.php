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

Route::get('/','Frontend\HomeController@index');
Route::get('/danh-muc/{slug?}','Frontend\CategoryController@index')->name('get.category');
Route::get('tat-ca-khoa-hoc','Frontend\CategoryController@index')->name('get.category.all');
