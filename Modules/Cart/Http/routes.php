<?php

Route::group(['middleware' => 'web', 'prefix' => 'cart', 'namespace' => 'Modules\Cart\Http\Controllers'], function()
{
    Route::get('/', 'CartController@index');
    Route::post('/add',
      [
        'before' => 'csrf',
        'uses' => 'CartController@store'
      ]);
});
