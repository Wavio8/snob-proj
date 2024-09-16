<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'forms', 'as' => 'forms.', 'namespace' => 'Forms'], function () {
    Route::group(['prefix' => 'requests', 'as' => 'requests.'], function () {
        Route::get('/', 'RequestsController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'RequestsController@edit')->name('edit');
    });
});
