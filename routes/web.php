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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/verify/{token}', 'Auth\VerifyController@verify')->name('verify');
Route::get('/account', 'HomeController@editAccount')->name('account');
Route::post('/account', 'HomeController@accountEdit')->name('account.edit.submit');
Route::post('/account/password', 'HomeController@passwordChange')->name('password.change.submit');
Route::get('/transfer-funds', 'HomeController@fundTransfer')->name('transfer');
Route::post('/transfer-funds', 'HomeController@transferFund')->name('transfer.submit');



Route::prefix('admin')->group(function() {
	Route::get('/crypto-tokens/modify/{coin}', 'AdminController@coinModify')->name('admin.edit.coin');
	Route::patch('/crypto-tokens/{coin}', 'AdminController@coinUpdate')->name('admin.update.coin');
	Route::get('/crypto-tokens', 'AdminController@showCoinTypes')->name('admin.view.coins');
	Route::get('/view-lists', 'AdminController@showLists')->name('admin.view.lists');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	// password reset routes
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});