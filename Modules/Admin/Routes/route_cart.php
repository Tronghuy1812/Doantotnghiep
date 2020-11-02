
<?php

Route::prefix('transaction')->namespace('Cart')->group(function (){
    Route::get('/', 'AdminTransactionController@index')->name('get_admin.transaction.index')->middleware('permission:transaction_index|full');
});
