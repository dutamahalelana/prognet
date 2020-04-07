<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


//Route Default
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


//Route User
Route::get('/userhome', function () {
  return view('userHome');
})->middleware('auth:user')->name('userhome');

Route::get('/registeruser', 'AuthUserController@getRegisterUser')->middleware('guest');
Route::post('/registeruser', 'AuthUserController@postRegisterUser')->name('registeruser')->middleware('guest');

Route::get('/loginuser', 'AuthUserController@getLoginUser')->middleware('guest');
Route::post('/loginuser', 'AuthUserController@postLoginUser')->name('loginuser')->middleware('guest');

Route::get('/logout/user', 'AuthUserController@logout')->name('logout')->middleware('auth:user');


//Route Admin
Route::get('/adminhome', function () {
    return view('adminHome');
})->middleware('auth:admin')->name('adminhome');

Route::get('/registeradmin', 'AuthAdminController@getRegisterAdmin')->middleware('guest');
Route::post('/registeradmin', 'AuthAdminController@postRegisterAdmin')->name('registeradmin')->middleware('guest');

Route::get('/loginadmin', 'AuthAdminController@getLoginAdmin')->middleware('guest');
Route::post('/loginadmin', 'AuthAdminController@postLoginAdmin')->name('loginadmin')->middleware('guest');

Route::get('/logout/admin', 'AuthAdminController@logout')->name('logoutadmin')->middleware('auth:admin');


//test route 25 maret 2020
Route::get('/test', function () {
    return view('test');
});
