<?php
    // Roles Section.... Child funtion called Applications of Parent function Pages
    Route::group(['prefix' => 'Applications' , 'as' => 'applications.'],function(){

        Route::get('add' , function (){
            return view('applications.add');
        })->name('add');

        Route::get('show' , function (){
            return view('applications.show');
        })->name('show');

        Route::get('Edit' , function (){
            return view('applications.Edit');
        })->name('Edit');
    });

?>