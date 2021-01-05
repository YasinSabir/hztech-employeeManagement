<?php
    // Roles Section.... Child funtion called Roles of Parent function Pages
    Route::group(['prefix' => 'Roles' , 'as' => 'roles.','middleware' => ['auth:web']],function(){

        Route::get('add' , function (){
            return view('roles.add');
        })->name('add');

        Route::post('add','RoleController@store')->name('add');
//        Route::post('add', ['as' => '.add' , 'uses' => 'RoleController@store' ]);

        /*Route::get('show' , function (){
            return view('roles.show');
        })->name('show');*/

        Route::get('show','RoleController@show')->name('show');

        Route::get('Edit' , function (){
            return view('roles.Edit');
        })->name('Edit');

        Route::get('Edit/{id}','RoleController@edit')->name('Edit');
        Route::post('Edit/{id}','RoleController@update')->name('Edit');

        Route::delete('delete/{id}','RoleController@destroy')->name('delete');

    });

?>