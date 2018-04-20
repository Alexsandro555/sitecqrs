<?php

Route::group(['middleware' => 'web', 'prefix' => 'files', 'namespace' => 'Modules\Files\Http\Controllers'], function()
{
    Route::get('/', 'FilesController@index');
    Route::post('/upload',
      [
        'before' => 'csrf',
        'uses' => 'FilesController@store'
      ]);
    Route::get('/get/{id}', 'FilesController@getFiles');
});
