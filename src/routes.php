<?php
Route::group(array('prefix'=>'api/v1', 'middleware' => ['web']), function()
{
    Route::resource('multichain', '\imperiansystems\multichain\StreamController');
});
