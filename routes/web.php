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
Route::auth();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/member', function(){
	return "halaman member";
});

Route::group(['middleware' => ['web', 'auth', 'roles']],function(){
 Route::group(['roles'=>'Tamu'],function(){
  Route::resource('site', 'SiteController');
 });
 
 Route::group(['roles'=>'Admin'],function(){
  Route::resource('user', 'UserController');
 });
});