<?php

Route::group(['prefix' => 'Permissions', 'as' => 'permissions.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'PermissionsController@create')->name('add');
    Route::post('store', 'PermissionsController@store')->name('store');
    Route::get('show', 'PermissionsController@show')->name('show');
//
//    Route::get('Edit/{id}', 'PreviligesController@edit')->name('Edit');
//    Route::post('Edit/{id}', 'PreviligesController@update')->name('Edit');
//
//    Route::delete('delete/{id}', 'PreviligesController@destroy')->name('delete');

});

