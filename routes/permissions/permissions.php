<?php

Route::group(['prefix' => 'Permissions', 'as' => 'permissions.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'PermissionsController@create')->name('add');
    Route::post('store', 'PermissionsController@store')->name('store');
    Route::get('show', 'PermissionsController@show')->name('show');
//
    Route::get('Edit/{id}', 'PermissionsController@edit')->name('Edit');
    Route::post('Edit/{id}', 'PermissionsController@update')->name('Edit');
//
    Route::delete('delete/{id}', 'PermissionsController@destroy')->name('delete');

});

