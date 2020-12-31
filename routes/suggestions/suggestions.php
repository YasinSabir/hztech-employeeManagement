<?php
    // Roles Section.... Child funtion called Suggestions of Parent function Pages
    Route::group(['prefix' => 'Suggestions' , 'as' => 'suggestions.'],function(){

        Route::get('add' , function (){
            return view('suggestions.add');
        })->name('add');

        Route::get('show' , function (){
            return view('suggestions.show');
        })->name('show');
        Route::get('Edit' , function (){
            return view('suggestions.Edit');
        })->name('Edit');
    });

?>