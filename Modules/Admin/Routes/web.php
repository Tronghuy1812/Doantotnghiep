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


Route::group(['namespace' => 'Auth','prefix' => 'auth'], function (){
    Route::get('login','AdminLoginController@login')->name('get_admin.login');
    Route::post('login','AdminLoginController@postLogin');

    Route::get('logout','AdminLoginController@logout')->name('get_admin.logout');
});
Route::prefix('admin')->middleware('checkLoginAdmin')->group(function() {
    Route::get('/', 'AdminDashboardController@index')->name('get_admin.dashboard')->middleware('permission:dashboard|full');

    Route::prefix('tag')->group(function (){
        Route::get('/', 'AdminTagController@index')->name('get_admin.tag.index')->middleware('permission:tag_index|full');
        Route::get('/create', 'AdminTagController@create')->name('get_admin.tag.create')->middleware('permission:tag_create|full');
        Route::post('/create', 'AdminTagController@store');
        Route::get('update/{id}', 'AdminTagController@edit')->name('get_admin.tag.edit')->middleware('permission:tag_edit|full');
        Route::post('update/{id}', 'AdminTagController@update');
        Route::get('delete/{id}', 'AdminTagController@delete')->name('get_admin.tag.delete')->middleware('permission:tag_delete|full');
    });

    Route::prefix('category')->group(function (){
        Route::get('/', 'AdminCategoryController@index')->name('get_admin.category.index')->middleware('permission:category_index|full');
        Route::get('/create', 'AdminCategoryController@create')->name('get_admin.category.create')->middleware('permission:category_create|full');
        Route::post('/create', 'AdminCategoryController@store');
        Route::get('update/{id}', 'AdminCategoryController@edit')->name('get_admin.category.edit')->middleware('permission:category_edit|full');
        Route::post('update/{id}', 'AdminCategoryController@update');
        Route::get('delete/{id}', 'AdminCategoryController@delete')->name('get_admin.category.delete')->middleware('permission:category_delete|full');
    });

    Route::prefix('teacher')->group(function (){
        Route::get('/', 'AdminTeacherController@index')->name('get_admin.teacher.index')->middleware('permission:teacher_index|full');
        Route::get('/create', 'AdminTeacherController@create')->name('get_admin.teacher.create')->middleware('permission:teacher_create|full');
        Route::post('/create', 'AdminTeacherController@store');
        Route::get('update/{id}', 'AdminTeacherController@edit')->name('get_admin.teacher.edit')->middleware('permission:teacher_edit|full');
        Route::post('update/{id}', 'AdminTeacherController@update');
        Route::get('delete/{id}', 'AdminTeacherController@delete')->name('get_admin.teacher.delete')->middleware('permission:teacher_delete|full');
    });

    Route::prefix('course')->group(function (){
        Route::get('/', 'AdminCourseController@index')->name('get_admin.course.index')->middleware('permission:course_index|full');
        Route::get('/create', 'AdminCourseController@create')->name('get_admin.course.create')->middleware('permission:course_create|full');
        Route::post('/create', 'AdminCourseController@store');
        Route::get('update/{id}', 'AdminCourseController@edit')->name('get_admin.course.edit')->middleware('permission:course_edit|full');
        Route::post('update/{id}', 'AdminCourseController@update');
        Route::get('delete/{id}', 'AdminCourseController@delete')->name('get_admin.course.delete')->middleware('permission:course_delete|full');
        Route::post('content/add/{id}', 'AdminCourseContentController@store')->name('get_admin.course_content.create')->middleware('permission:course_content_add|full');

    });

    Route::prefix('slide')->group(function (){
        Route::get('/', 'AdminSlideController@index')->name('get_admin.slide.index')->middleware('permission:slide_index|full');
        Route::get('/create', 'AdminSlideController@create')->name('get_admin.slide.create')->middleware('permission:slide_create|full');
        Route::post('/create', 'AdminSlideController@store');
        Route::get('update/{id}', 'AdminSlideController@edit')->name('get_admin.slide.edit')->middleware('permission:slide_edit|full');
        Route::post('update/{id}', 'AdminSlideController@update');
        Route::get('delete/{id}', 'AdminSlideController@delete')->name('get_admin.slide.delete')->middleware('permission:slide_delete|full');
    });

    Route::prefix('ajax')->namespace('Ajax')->group(function (){
        Route::post('/upload/image', 'AdminAjaxUploadImageController@processUpload')->name('post_ajax_admin.uploads');
    });

    Route::prefix('user')->group(function (){
        Route::get('/', 'AdminUserController@index')->name('get_admin.user.index')->middleware('permission:user_index|full');
        Route::get('/create', 'AdminUserController@create')->name('get_admin.user.create')->middleware('permission:user_create|full');
        Route::post('/create', 'AdminUserController@store');
        Route::get('update/{id}', 'AdminUserController@edit')->name('get_admin.user.edit')->middleware('permission:user_edit|full');
        Route::post('update/{id}', 'AdminUserController@update');
        Route::get('delete/{id}', 'AdminUserController@delete')->name('get_admin.user.delete')->middleware('permission:user_delete|full');
    });

    require_once 'route_acl.php';
    require_once 'route_cart.php';
});
