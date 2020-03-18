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
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

////管理者画面
//Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {
//    Route::get('/home', 'Addministrator\HomeController@index');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// 全ユーザ
Route::group(['middleware' => ['auth', 'can:user-higher']], function () {
    // ユーザ一覧
    Route::get('/account', 'AccountController@index')->name('account.index');
});

// 管理者以上
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    // ユーザ編集
    Route::get('/account/edit/{user_id}', 'AccountController@edit')->name('account.edit');
    Route::post('/account/edit/{user_id}', 'AccountController@updateData')->name('account.edit');

    // ユーザ削除
    Route::post('/account/delete/{user_id}', 'AccountController@deleteData');
});

// システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {
});

//休み希望
Route::get('posts', 'PostsController@index');
Route::post('posts', 'PostsController@store');
Route::get('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');
//Route::group(['prefix' => 'admin', 'middleware' => 'admin_auth'], function () {
//    Route::get('/home', 'Addministrator\HomeController@index');
//});
//休み希望送信
Route::get('vacations', 'VacationController@index');
Route::post('vacations', 'VacationController@store');

//baseshift送信
Route::get('baseshift', 'BaseShiftsController@index');
Route::post('baseshift/store', 'BaseShiftsController@store');

//承認機能
Route::prefix('admin/')->group(function () {
    Route::get('vacation/user_accept', 'Admin\Vacation\UserAcceptController@index')->middleware('admin_auth');
    Route::get('vacation/ajax/user_accept', 'Admin\Vacation\Ajax\UserAcceptController@index')->middleware('admin_auth');
    Route::post('vacation/ajax/user_accept/accept', 'Admin\Vacation\Ajax\UserAcceptController@accept')->middleware('admin_auth');
    Route::get('baseshift/user_accept', 'Admin\baseshift\UserAcceptController@index')->middleware('admin_auth');
    Route::get('baseshift/ajax/user_accept', 'Admin\baseshift\Ajax\UserAcceptController@index')->middleware('admin_auth');
    Route::post('baseshift/ajax/user_accept/accept', 'Admin\baseshift\Ajax\UserAcceptController@accept')->middleware('admin_auth');
});
Route::get('login/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');
//ユーザー編集画面
Route::resource('users', 'UserController');
Route::resource('baseshif', 'BaseShiftController');