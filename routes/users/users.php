<?php
    // Roles Section.... Child funtion called Users of Parent function Pages
    Route::group(['prefix' => 'Users' , 'as' => 'users.'],function(){


        Route::get('add','UserController@create')->name('add');
        Route::post('store','UserController@store')->name('store');

        Route::get('show','UserController@index')->name('show');

        Route::get('Edit' , function (){
            return view('users.Edit');
        })->name('Edit');

        Route::get('Edit/{id}','UserController@edit')->name('Edit');
        Route::post('Edit/{id}','UserController@update')->name('Edit');

        Route::delete('delete/{id}','UserController@destroy')->name('delete');

        Route::get('profile','UserController@profile')->name('profile');
        Route::post('profile','UserController@editprofile')->name('profile');
    });

?>