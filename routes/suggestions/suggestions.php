<?php
    // Roles Section.... Child funtion called Suggestions of Parent function Pages
    Route::group(['prefix' => 'Suggestions' , 'as' => 'suggestions.','middleware' => ['auth:web']],function(){


        Route::get('add','SuggestionController@create')->name('add')->middleware('permission:add suggestion,add');
        Route::post('store','SuggestionController@store')->name('store')->middleware('permission:add suggestion,add');

        Route::get('show','SuggestionController@show')->name('show')->middleware('permission:view suggestion,view');

        Route::get('Edit/{id}','SuggestionController@edit')->name('Edit')->middleware('permission:edit suggestion,Edit');
        Route::post('Edit/{id}','SuggestionController@update')->name('Edit')->middleware('permission:edit suggestion,Edit');;

        Route::delete('delete/{id}','SuggestionController@destroy')->name('delete')->middleware('permission:delete suggestion,delete');;
    });

?>