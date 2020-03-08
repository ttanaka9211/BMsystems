<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Http\Controllers\VacationController;

Route::get('/', 'HomeController@index');

/* ログイン、ログアウト、パスワード変更、パスワード変更（忘れた時） */
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');
//本会員登録入力
Route::get('register/verify/{token}', 'Auth\RegisterController@showForm');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');
Route::get('login/{provider}', 'Auth\LoginController@socialLogin');
Route::get('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');
Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {
    Route::get('/home', 'Addministrator\HomeController@index');
});
//休み希望送信
Route::get('vacations', 'VacationController@index');
Route::post('vacations', 'VacationController@store');