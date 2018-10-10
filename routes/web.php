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

/* Маршруты аутентификации */
Route::get('authenticated', 'main\MainController@authenticated');
Route::get('/admin', ['uses' => 'Admin\AdminController@index', 'as' => 'admin'])->middleware('admin');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('exit', function() {
  Auth::logout();
});

Route::get('/initializer/fields/{name}', 'Initializer\InitializerController@fields');

// Загрузка данных для меню
Route::get('/left-menu', 'Menu\MenuController@index');


Route::get('/catalog/{slug}', 'main\MainController@catalog');
Route::get('/catalog/{slugTypeProduct}/{slugLineProduct}', 'main\MainController@lineProduct');
// Должен располагаться в самом низу
Route::get('/catalog/{slug_type_product}/{slug_producer_type_product}/{slug}',['uses' => 'main\MainController@detail', 'as' => 'detail']);


