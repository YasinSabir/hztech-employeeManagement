<?php
    // Roles Section.... Child funtion called Complains of Parent function Pages
    Route::group(['prefix' => 'Complains' , 'as' => 'complains.','middleware' => ['auth:web']],function(){

        Route::get('add','ComplainController@create')->name('add');
        Route::post('store','ComplainController@store')->name('store');

        Route::get('show','ComplainController@show')->name('show');

        Route::get('Edit' , function (){
            return view('complains.Edit');
        })->name('Edit');

        Route::get('Edit/{id}','ComplainController@edit')->name('Edit');
        Route::post('Edit/{id}','ComplainController@update')->name('Edit');

        Route::delete('delete/{id}','ComplainController@destroy')->name('delete');

    });

?>