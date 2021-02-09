<?php
    // Roles Section.... Child funtion called Applications of Parent function Pages
    Route::group(['prefix' => 'Applications' , 'as' => 'applications.','middleware' => ['auth:web']],function(){

        Route::get('add', 'ApplicationController@create')->name('add');//->middleware('permission:add holiday,add');
        Route::post('store', 'ApplicationController@store')->name('store');//->middleware('permission:add holiday,add');

        Route::get('show', 'ApplicationController@show')->name('show');
        Route::get('view/{id}', 'ApplicationController@view')->name('view');
        Route::get('viewall', 'ApplicationController@viewall')->name('viewall');

        Route::delete('delete/{id}', 'ApplicationController@destroy')->name('delete');

        Route::get('Edit' , function (){
            return view('applications.Edit');
        })->name('Edit');
    });

?>