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
return Redirect::to('https://www.instagram.com/adeptiuai/');
  //  return view('welcome');
});
Route::get('/guia',function(){
return Redirect::to('https://bit.ly/guia_adepti');

});
Route::get('/encuesta',function(){
return Redirect::to('https://docs.google.com/forms/d/e/1FAIpQLSc-3GoQCYSikYu6T7tgri73UnNUfBL6LLodDhZzADBIkCQbaQ/viewform');
});

Auth::routes();
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('/home', 'HomeController@index')->name('home');
