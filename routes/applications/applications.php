<?php
    // Roles Section.... Child funtion called Applications of Parent function Pages
    Route::group(['prefix' => 'Applications' , 'as' => 'applications.','middleware' => ['auth:web']],function(){

        Route::get('add', 'ApplicationController@create')->name('add')->middleware(['userpermission:add application,add']);//->middleware('permission:add holiday,add');
        Route::post('store', 'ApplicationController@store')->name('store')->middleware(['userpermission:add application,add']);//->middleware('permission:add holiday,add');

        Route::get('show', 'ApplicationController@show')->name('show')->middleware(['userpermission:view application,view']);
        Route::get('view/{id}', 'ApplicationController@view')->name('view');
        Route::get('viewall', 'ApplicationController@viewall')->name('viewall')->middleware(['userpermission:view all application,view all']);

        Route::delete('delete/{id}', 'ApplicationController@destroy')->name('delete')->middleware(['userpermission:delete application,delete']);
        Route::delete('deleteall/{id}', 'ApplicationController@destroyall')->name('deleteall')->middleware(['userpermission:delete all application,delete all']);

        Route::get('Edit' , function (){
            return view('applications.Edit');
        })->name('Edit');
    });

?>