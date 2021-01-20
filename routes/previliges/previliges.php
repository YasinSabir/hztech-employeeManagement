<?php

Route::group(['prefix' => 'Previliges', 'as' => 'previliges.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'PreviligesController@create')->name('add');
    Route::post('store', 'PreviligesController@store')->name('store');
    Route::get('show', 'PreviligesController@show')->name('show');

    Route::get('Edit/{id}', 'PreviligesController@edit')->name('Edit');
    Route::post('Edit/{id}', 'PreviligesController@update')->name('Edit');

    Route::delete('delete/{id}', 'PreviligesController@destroy')->name('delete');

});

