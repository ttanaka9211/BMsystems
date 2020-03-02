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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('register/pre_check', 'Auth\RegisterController@pre_check')->name('register.pre_check');
Route::get('register/verify/{token}', 'Auth\RegisterController@shoFrom');
Route::post('register/main_check', 'Auth\RegisterController@mainCheck')->name('register.main.check');
Route::post('register/main_register', 'Auth\RegisterController@mainRegister')->name('register.main.registered');
Route::get('login/{provider}', 'App\Http\Controllers\Auth\LoginController@socialLogin');
Route::get('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');