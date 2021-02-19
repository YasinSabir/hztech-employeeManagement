<?php

Route::group(['prefix' => 'Permissions', 'as' => 'permissions.', 'middleware' => ['auth:web']], function () {


    Route::get('add', 'PermissionsController@create')->name('add')->middleware(['userpermission:add permission,add']);
    Route::post('store', 'PermissionsController@store')->name('store')->middleware(['userpermission:add permission,add']);

    Route::get('show', 'PermissionsController@show')->name('show')->middleware(['userpermission:show permission,show']);

    Route::get('Edit/{id}', 'PermissionsController@edit')->name('Edit')->middleware(['userpermission:edit permission,Edit']);
    Route::post('Edit/{id}', 'PermissionsController@update')->name('Edit')->middleware(['userpermission:edit permission,Edit']);

    Route::delete('delete/{id}', 'PermissionsController@destroy')->name('delete')->middleware(['userpermission:delete permission,delete']);

});

