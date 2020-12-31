<?php
    // Roles Section.... Child funtion called Roles of Parent function Pages
    Route::group(['prefix' => 'Roles' , 'as' => 'roles.'],function(){

        Route::get('add' , function (){
            return view('roles.add');
        })->name('add');

        Route::get('show' , function (){
            return view('roles.show');
        })->name('show');

        Route::get('Edit' , function (){
            return view('roles.Edit');
        })->name('Edit');

    });

?>