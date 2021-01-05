<?php
    // Roles Section.... Child funtion called Suggestions of Parent function Pages
    Route::group(['prefix' => 'Suggestions' , 'as' => 'suggestions.','middleware' => ['auth:web']],function(){


        Route::get('add','SuggestionController@create')->name('add');
        Route::post('store','SuggestionController@store')->name('store');

        Route::get('show','SuggestionController@show')->name('show');

        Route::get('Edit/{id}','SuggestionController@edit')->name('Edit');
        Route::post('Edit/{id}','SuggestionController@update')->name('Edit');

        Route::delete('delete/{id}','SuggestionController@destroy')->name('delete');
    });

?>