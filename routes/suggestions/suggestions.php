<?php
    // Roles Section.... Child funtion called Suggestions of Parent function Pages
    Route::group(['prefix' => 'Suggestions' , 'as' => 'suggestions.','middleware' => ['auth:web']],function(){


        Route::get('add','SuggestionController@create')->name('add')->middleware('userpermission:add suggestion,add');
        Route::post('store','SuggestionController@store')->name('store')->middleware('userpermission:add suggestion,add');

        Route::get('show','SuggestionController@show')->name('show')->middleware('userpermission:view suggestion,view');
        Route::get('viewall','SuggestionController@viewall')->name('viewall')->middleware('userpermission:view all suggestion,view all');
        Route::get('view/{id}','SuggestionController@view')->name('view');

        Route::get('Edit/{id}','SuggestionController@edit')->name('Edit')->middleware('userpermission:edit suggestion,Edit');
        Route::post('Edit/{id}','SuggestionController@update')->name('Edit')->middleware('userpermission:edit suggestion,Edit');

        Route::get('EditAll/{id}','SuggestionController@editall')->name('EditAll')->middleware('userpermission:edit all suggestion,Edit all');
        Route::post('EditAll/{id}','SuggestionController@updateall')->name('EditAll')->middleware('userpermission:edit all suggestion,Edit all');

        Route::delete('delete/{id}','SuggestionController@destroy')->name('delete')->middleware('userpermission:delete suggestion,delete');
        Route::delete('deleteall/{id}','SuggestionController@destroyall')->name('deleteall')->middleware('userpermission:delete all suggestion,delete all');
    });

?>