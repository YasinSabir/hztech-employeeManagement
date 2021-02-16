<?php
    // Users Section.... Child funtion called Users of Parent function Pages
    Route::group(['prefix' => 'Users' , 'as' => 'users.','middleware' => ['auth:web']],function(){


        Route::get('add','UserController@create')->name('add')->middleware(['userpermission:add user,add']);//'permission:add user,add',
        Route::post('store','UserController@store')->name('store')->middleware(['userpermission:add user,add']);

        Route::get('show','UserController@index')->name('show')->middleware(['userpermission:view user,view','restrict']);//,'maintain'

        Route::get('Edit' , function (){
            return view('users.Edit');
        })->name('Edit');

        Route::get('Edit/{id}','UserController@edit')->name('Edit')->middleware('userpermission:edit user,Edit');
        Route::post('Edit/{id}','UserController@update')->name('Edit')->middleware('userpermission:edit user,Edit');

        Route::delete('delete/{id}','UserController@destroy')->name('delete')->middleware('userpermission:delete user,delete');

        Route::get('profile','UserController@profile')->name('profile');
        Route::post('profile','UserController@editprofile')->name('profile');

        Route::get('/getEmployees', 'UserController@getEmployees')->name('getEmployees');

        Route::get('/UserLog', 'UserController@UserLogView')->name('UserLog')->middleware('userpermission:mark attendance,attendance');
        Route::post('/TimeLog', 'UserController@TimeLog')->name('time_log')->middleware('userpermission:mark attendance,attendance');

        Route::get('/DayLog', 'UserController@DayLogView')->name('DayLog')->middleware('userpermission:day logs,day-logs');
        Route::get('/MonthLog', 'UserController@MonthLogView')->name('MonthLog')->middleware('userpermission:month logs,month-logs');

        Route::post('manualtime','UserController@manualtime')->name('manualtime')->middleware('userpermission:manual time,manual-time');

    });

?>