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

Route::group(['namespace' => 'Frontend'], function (){
    Route::post('/dang-nhap','LoginController@index')->name('get.login');
    Route::post('/dang-ky','RegisterController@register')->name('get.register');
    Route::post('/social','SocialController@callback')->name('post.social');
    Route::get('/dang-xuat','RegisterController@logout')->name('get.logout');
    Route::get('/','HomeController@index')->name('get.home');
    Route::get('/trang-chu','HomeController@index')->name('get.home');
    Route::get('khoa-hoc-ban-chay.html','CoursePaySellingController@index')->name('get.course.pay_selling');
    Route::get('khoa-hoc-yeu-thich.html','CourseFavouriteController@index')->name('get.course.favourite');
    Route::get('/danh-muc/{slug?}','CategoryController@index')->name('get.category');
    Route::get('/khoa-hoc/{slug?}','HubCourseController@render')->name('get.course.render');
    Route::get('tat-ca-khoa-hoc','CategoryController@index')->name('get.category.all');
    Route::get('giang-vien/{slug}','TeacherController@getCourseByTeacherSlug')->name('get.teacher.course');
    Route::get('tim-kiem','SearchController@search')->name('get.search');

    Route::group(['namespace' => 'Ajax','prefix' => 'ajax'], function(){
        Route::get('course/list-by-category/{id}','AjaxHomeController@getCourseByCategory')
            ->name('ajax_get.course.by_category');

        Route::get('course/search','AjaxSearchController@search');

        Route::get('course/view/{videoID}','AjaxUserViewCourseController@viewCourseByVideoID')
            ->name('ajax_get.course.view_course');
    });

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});
