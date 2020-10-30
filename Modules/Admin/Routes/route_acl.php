<?php


Route::prefix('permission')->namespace('Acl')->group(function (){
    Route::get('/', 'AdminPermissionController@index')->name('get_admin.permission.index');
    Route::get('/create', 'AdminPermissionController@create')->name('get_admin.permission.create');
    Route::post('/create', 'AdminPermissionController@store');
    Route::get('update/{id}', 'AdminPermissionController@edit')->name('get_admin.permission.edit');
    Route::post('update/{id}', 'AdminPermissionController@update');
    Route::get('delete/{id}', 'AdminPermissionController@delete')->name('get_admin.permission.delete');
});

Route::prefix('role')->namespace('Acl')->group(function (){
    Route::get('/', 'AdminRoleController@index')->name('get_admin.role.index');
    Route::get('/create', 'AdminRoleController@create')->name('get_admin.role.create');
    Route::post('/create', 'AdminRoleController@store');
    Route::get('update/{id}', 'AdminRoleController@edit')->name('get_admin.role.edit');
    Route::post('update/{id}', 'AdminRoleController@update');
    Route::get('delete/{id}', 'AdminRoleController@delete')->name('get_admin.role.delete');
});


Route::prefix('account')->namespace('Acl')->group(function (){
    Route::get('/', 'AdminAccountController@index')->name('get_admin.account.index');
    Route::get('/create', 'AdminAccountController@create')->name('get_admin.account.create');
    Route::post('/create', 'AdminAccountController@store');
    Route::get('update/{id}', 'AdminAccountController@edit')->name('get_admin.account.edit');
    Route::post('update/{id}', 'AdminAccountController@update');
    Route::get('delete/{id}', 'AdminAccountController@delete')->name('get_admin.account.delete');
});
