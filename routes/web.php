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

<<<<<<< HEAD
Route::get('/', 'PageController@index');
=======
Route::get('/', function () {
return Redirect::to('https://www.instagram.com/adeptiuai/');
  //  return view('welcome');
});
Route::get('/guia',function(){
return Redirect::to('https://bit.ly/guia_adepti');

});
Route::get('/encuesta',function(){
return Redirect::to('https://docs.google.com/forms/d/e/1FAIpQLSc-3GoQCYSikYu6T7tgri73UnNUfBL6LLodDhZzADBIkCQbaQ/viewform');
});
>>>>>>> 9d15c12f0a4dde3b90a79249a0a80ade073db398

// Authentication Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => '', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/reset', ['as' => 'password.update', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);

Route::get('/auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
