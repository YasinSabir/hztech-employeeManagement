<?php

Route::group(['prefix' => 'Holidays', 'as' => 'holidays.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'HolidayController@create')->name('add')->middleware('permission:add holiday,add');
    Route::post('store', 'HolidayController@store')->name('store')->middleware('permission:add holiday,add');

    Route::get('show', 'HolidayController@show')->name('show')->middleware('permission:view holiday,view');

    Route::get('Edit/{id}', 'HolidayController@edit')->name('Edit')->middleware('permission:edit holiday,Edit');
    Route::post('Edit/{id}', 'HolidayController@update')->name('Edit')->middleware('permission:edit holiday,Edit');

    Route::delete('delete/{id}', 'HolidayController@destroy')->name('delete')->middleware('permission:delete holiday,delete');;


});

