<?php
Route::group(array('prefix'=>'multichain/v1', 'middleware' => ['web']), function()
{
    Route::resource('stream', '\imperiansystems\multichain\controllers\StreamController');
    Route::resource('item', '\imperiansystems\multichain\controllers\ItemController');

    Route::get('node', '\imperiansystems\multichain\controllers\NodeController@status');

    Route::post('address/grant', '\imperiansystems\multichain\controllers\AddressController@grant');
    Route::post('address/revoke', '\imperiansystems\multichain\controllers\AddressController@revoke');
    Route::get('address/{address}', '\imperiansystems\multichain\controllers\AddressController@status');
});
