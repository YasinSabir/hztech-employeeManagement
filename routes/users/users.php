<?php
    // Roles Section.... Child funtion called Users of Parent function Pages
    Route::group(['prefix' => 'Users' , 'as' => 'users.'],function(){

        Route::get('add' , function (){
            return view('users.add');
        })->name('add');

        Route::get('show' , function (){
            return view('users.show');
        })->name('show');

        Route::get('Edit' , function (){
            return view('users.Edit');
        })->name('Edit');
    });

?>