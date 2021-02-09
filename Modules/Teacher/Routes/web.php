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

Route::group(['namespace' => 'Auth','prefix' => 'auth-teacher'], function (){
    Route::get('login','TeacherLoginController@login')->name('get_teacher.login');
    Route::post('login','TeacherLoginController@postLogin');

    Route::get('logout','TeacherLoginController@logout')->name('get_teacher.logout');
});

Route::prefix('teacher')->middleware('checkLoginTeacher')->group(function() {
    Route::get('/', 'TeacherController@index')->name('get_teacher.dashboard');
    Route::prefix('course')->group(function (){
        Route::get('/', 'TeacherCourseController@index')->name('get_teacher.course.index');
        Route::get('/create', 'TeacherCourseController@create')->name('get_teacher.course.create');
        Route::post('/create', 'TeacherCourseController@store');
        Route::get('update/{id}', 'TeacherCourseController@edit')->name('get_teacher.course.edit');
        Route::prefix('view')->group(function (){
            Route::get('{id}', 'TeacherCourseController@show')->name('get_teacher.course.show');
        });

        Route::prefix('content')->group(function (){
            Route::get('{id}/index', 'TeacherContentController@index')->name('get_teacher.course_content.index');
            Route::get('{id}/create', 'TeacherContentController@create')->name('get_teacher.course_content.create');
            Route::post('{id}/create', 'TeacherContentController@store');

            Route::get('{id}/update/{contentId}', 'TeacherContentController@edit')->name('get_teacher.course_content.edit');
            Route::post('{id}/update/{contentId}', 'TeacherContentController@update');
            Route::get('{id}/delete/{contentId}', 'TeacherContentController@delete')->name('get_teacher.course_content.delete');
        });
//
        Route::prefix('video')->group(function (){
            Route::get('{id}/index', 'TeacherVideoController@index')->name('get_teacher.course_video.index');
            Route::get('{id}/create', 'TeacherVideoController@create')->name('get_teacher.course_video.create');
            Route::post('{id}/create', 'TeacherVideoController@store');

            Route::get('{id}/update/{videoId}', 'TeacherVideoController@edit')->name('get_teacher.course_video.edit');
            Route::post('{id}/update/{videoId}', 'TeacherVideoController@update');
            Route::get('{id}/delete/{videoId}', 'TeacherVideoController@delete')->name('get_teacher.course_video.delete');
        });
        Route::prefix('question')->group(function (){
            Route::get('{id}/index', 'TeacherQuestionController@index')->name('get_teacher.course_question.index');
            Route::get('{id}/create', 'TeacherQuestionController@create')->name('get_teacher.course_question.create');
            Route::post('{id}/create', 'TeacherQuestionController@store')->name('get_teacher.course_question.create');

            Route::get('{id}/update/{questId}', 'TeacherQuestionController@edit')->name('get_teacher.course_question.edit');
            Route::post('{id}/update/{questId}', 'TeacherQuestionController@update');
            Route::get('{id}/delete/{questId}', 'TeacherQuestionController@delete')->name('get_teacher.course_question.delete');
            Route::get('{id}/answers/{questId}/{answerId}','TeacherQuestionController@success')->name('get_teacher.course_question.success')
                ->middleware('permission:course_question_success|full');
        });
        Route::prefix('vote')->group(function (){
            Route::get('{id}/index', 'TeacherVoteController@index')->name('get_teacher.course_vote.index');
            Route::get('{id}/delete/{voteId}', 'TeacherVoteController@delete')->name('get_teacher.course_vote.delete');
        });

        Route::post('update/{id}', 'TeacherCourseController@update');
        Route::get('delete/{id}', 'TeacherCourseController@delete')->name('get_teacher.course.delete');
    });
});
