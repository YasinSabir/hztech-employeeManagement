<?php

Route::group(['prefix' => 'Holidays', 'as' => 'holidays.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'HolidayController@create')->name('add')->middleware('userpermission:add holiday,add');
    Route::post('store', 'HolidayController@store')->name('store')->middleware('userpermission:add holiday,add');

    Route::get('show', 'HolidayController@show')->name('show')->middleware('userpermission:view holiday,view');

    Route::get('Edit/{id}', 'HolidayController@edit')->name('Edit')->middleware('userpermission:edit holiday,Edit');
    Route::post('Edit/{id}', 'HolidayController@update')->name('Edit')->middleware('userpermission:edit holiday,Edit');

    Route::delete('delete/{id}', 'HolidayController@destroy')->name('delete')->middleware('userpermission:delete holiday,delete');;


});

