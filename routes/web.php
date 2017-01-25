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

use App\User;

Route::group(['middleware' => 'guest'], function(){
	Route::get('/', 'HomeController@index');
});
Route::auth();
Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => 'auth'], function(){
	Route::resource('beranda', 'BerandaController');
	Route::get('profile/{id}', 'ProfileController@show');
	Route::post('profile/{id}', 'ProfileController@update');
	Route::post('profile/picture/{id}', 'ProfileController@updatePicture');
});