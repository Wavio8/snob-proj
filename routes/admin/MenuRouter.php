<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'menu', 'as' => 'menu.'], function () {
    Route::get('/', 'MenuController@index')->name('index');
    Route::match(['get', 'post'], '/edit/{id?}', 'MenuController@edit')->name('edit');

    Route::get('/item', 'MenuController@item')->name('item');
    Route::match(['get', 'post'], '/itemedit/{menuid}/{id?}', 'MenuController@itemEdit')->name('item_edit');
});
