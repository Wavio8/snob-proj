<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    include('AdminAjax.php');


    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    Route::group(['namespace' => 'Admin'], function () {
        Route::group(['namespace' => 'Utility'], function () {
            Route::get('login', 'LoginController@login')->name('login');
        });

        Route::group(['middleware' => ['auth', 'admin_access']], function () {

            include('UsersRouter.php');
            include('SeoRouter.php');
            include('ContentRouter.php');
            include('FormsRouter.php');

            Route::group(['namespace' => 'Utility'], function () {
                include('MenuRouter.php');

                Route::group(['prefix' => 'page', 'as' => 'page.'], function () {
                    Route::get('/', 'PageController@index')->name('index');
                    Route::match(['get', 'post'], '/edit/{id?}', 'PageController@edit')->name('edit');
                });
                Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
                    Route::match(['get', 'post'], '/', 'SettingsController@index')->name('index');
                });
            });
        });
        
    });

    Route::get('/', function () {
        return  redirect()->route(auth()->check() ? 'admin.settings.index' : 'admin.login');
    });
});
