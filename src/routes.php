<?php
Route::group(array('prefix'=>'multichain/v1', 'middleware' => ['web']), function()
{
    Route::resource('stream', '\imperiansystems\multichain\StreamController');
    Route::resource('item', '\imperiansystems\multichain\ItemController');
});
