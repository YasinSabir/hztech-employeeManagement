<?php
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LogoutController;
use App\User;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/home', function () {
    $data = User::orderBy('id','DESC')->get();
    $notifications = new NewUserNotification($data);
    return view('pages.index',compact('notifications'));
})->name('dashboard.v1')->middleware('auth');

Route::get('error', function () {
    return view('errors.privillige');
})->name('error')->middleware('auth');


/*
 *
 *
 *
Route::group(['prefix' => 'Pages' , 'as' => 'pages.'],function(){

    Route::get('Widgets' , function (){
       return view('pages.widgets');
    })->name('widgets');

    
});*/
include_once('roles/roles.php');
include_once('applications/applications.php');
include_once('complains/complains.php');
include_once('suggestions/suggestions.php');
include_once('users/users.php');
include_once('holidays/holidays.php');
include_once('previliges/previliges.php');
include_once('permissions/permissions.php');

// Forms Section...

Route::get('/Advanced' , function (){
    return view('pages.forms.advanced');
})->name('advanced');




Auth::routes();
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/logouts','Auth\LogoutController@store')->name('logouts');

