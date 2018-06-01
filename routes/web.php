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

Route::get('/', ['uses' => 'main\MainController@index', 'as' => 'main']);
Route::get('authenticated', 'main\MainController@authenticated');
Route::get('/admin', ['uses' => 'Admin\AdminController@index', 'as' => 'admin'])->middleware('admin');
Route::get('/demo', 'main\MainController@mas');

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('exit', function() {
  Auth::logout();
});

Route::get('/initializer/fields/{name}', 'Initializer\InitializerController@fields');



