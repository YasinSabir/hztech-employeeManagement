<?php
    // Roles Section.... Child funtion called Complains of Parent function Pages
    Route::group(['prefix' => 'Complains' , 'as' => 'complains.','middleware' => ['auth:web']],function(){

        Route::get('add','ComplainController@create')->name('add')->middleware('userpermission:add complain,add');
        Route::post('store','ComplainController@store')->name('store')->middleware('userpermission:add complain,add');

        Route::get('show','ComplainController@show')->name('show')->middleware('userpermission:view complain,view');
        Route::get('viewall','ComplainController@viewall')->name('viewall')->middleware('userpermission:view all complain,view all');
        Route::get('view/{id}','ComplainController@view')->name('view');

        Route::get('Edit' , function (){
            return view('complains.Edit');
        })->name('Edit')->middleware('userpermission:edit complain,Edit');

        Route::get('Edit/{id}','ComplainController@edit')->name('Edit')->middleware('userpermission:edit complain,Edit');
        Route::post('Edit/{id}','ComplainController@update')->name('Edit')->middleware(['userpermission:edit complain,Edit',]);

        Route::get('EditAll/{id}','ComplainController@editall')->name('EditAll')->middleware('userpermission:edit all complain,Edit all');
        Route::post('EditAll/{id}','ComplainController@updateall')->name('EditAll')->middleware(['userpermission:edit all complain,Edit all',]);

        Route::delete('delete/{id}','ComplainController@destroy')->name('delete')->middleware(['userpermission:delete complain,delete all',]);
        Route::delete('deleteaall/{id}','ComplainController@destroyall')->name('deleteall')->middleware(['userpermission:delete all complain,delete all',]);

    });

?>