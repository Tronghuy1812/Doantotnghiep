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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminDashboardController@index')->name('get_admin.dashboard');

    Route::prefix('tag')->group(function (){
        Route::get('/', 'AdminTagController@index')->name('get_admin.tag.index');
        Route::get('/create', 'AdminTagController@create')->name('get_admin.tag.create');
        Route::post('/create', 'AdminTagController@store');
        Route::get('update/{id}', 'AdminTagController@edit')->name('get_admin.tag.edit');
        Route::post('update/{id}', 'AdminTagController@update');
        Route::get('delete/{id}', 'AdminTagController@delete')->name('get_admin.tag.delete');
    });

    Route::prefix('category')->group(function (){
        Route::get('/', 'AdminCategoryController@index')->name('get_admin.category.index');
        Route::get('/create', 'AdminCategoryController@create')->name('get_admin.category.create');
        Route::post('/create', 'AdminCategoryController@store');
        Route::get('update/{id}', 'AdminCategoryController@edit')->name('get_admin.category.edit');
        Route::post('update/{id}', 'AdminCategoryController@update');
        Route::get('delete/{id}', 'AdminCategoryController@delete')->name('get_admin.category.delete');
    });

    Route::prefix('teacher')->group(function (){
        Route::get('/', 'AdminTeacherController@index')->name('get_admin.teacher.index');
    });

    Route::prefix('ajax')->namespace('Ajax')->group(function (){
        Route::post('/upload/image', 'AdminAjaxUploadImageController@processUpload')->name('post_ajax_admin.uploads');
    });
});
