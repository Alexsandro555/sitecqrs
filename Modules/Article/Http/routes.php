<?php

Route::group(['middleware' => 'web', 'prefix' => 'article', 'namespace' => 'Modules\Article\Http\Controllers'], function()
{
    Route::get('/', 'ArticleController@index');
    Route::patch('/', 'ArticleController@store');
    Route::get('/default', 'ArticleController@create');
});
