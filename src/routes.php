<?php
Route::group(array('prefix'=>'multichain/v1', 'middleware' => ['web']), function()
{
    Route::resource('stream', '\imperiansystems\multichain\controllers\StreamController');
    Route::resource('item', '\imperiansystems\multichain\controllers\ItemController');
});
