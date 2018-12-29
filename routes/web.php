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

Route::get('/', 'PagesController@index');

Route::resource('birthday', 'BirthdayController')->names([
    'store' => 'birthday.store'
]);

//Route::auth();

Route::get('login', 'Auth\LoginController@login');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('auth/token/{token}', 'Auth\LoginController@authenticate');

Route::get('dashboard', function()
{
  return 'Welcome to our site, ' . Auth::user()->name;
});
