<?php
    // Roles Section.... Child funtion called Complains of Parent function Pages
    Route::group(['prefix' => 'Complains' , 'as' => 'complains.'],function(){

        Route::get('add' , function (){
            return view('complains.add');
        })->name('add');

        Route::get('show' , function (){
            return view('complains.show');
        })->name('show');

        Route::get('Edit' , function (){
            return view('complains.Edit');
        })->name('Edit');

    });

?>