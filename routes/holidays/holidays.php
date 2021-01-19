<?php

// Roles Section.... Child funtion called Users of Parent function Pages
Route::group(['prefix' => 'Holidays', 'as' => 'holidays.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'HolidayController@create')->name('add');
    Route::post('store', 'HolidayController@store')->name('store');

    Route::get('show', 'HolidayController@show')->name('show');

//     Route::get('Edit', function () {
//         return view('holidays.Edit');
//     })->name('Edit');

     Route::get('Edit/{id}', 'HolidayController@edit')->name('Edit');
     Route::post('Edit/{id}', 'HolidayController@update')->name('Edit');

     Route::delete('delete/{id}', 'HolidayController@destroy')->name('delete');



});

