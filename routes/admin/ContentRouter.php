<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'content', 'as' => 'content.', 'namespace' => 'Content'], function () {
    Route::group(['prefix' => 'title', 'as' => 'title.'], function () {
        Route::get('/', 'TitleController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'TitleController@edit')->name('edit');
    });
    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        Route::get('/', 'ServicesController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'ServicesController@edit')->name('edit');
    });
    Route::group(['prefix' => 'team', 'as' => 'team.'], function () {
        Route::get('/', 'TeamController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'TeamController@edit')->name('edit');
    });
    Route::group(['prefix' => 'cases', 'as' => 'cases.'], function () {
        Route::get('/', 'CasesController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'CasesController@edit')->name('edit');
    });

    Route::group(['prefix' => 'group_vacancies', 'as' => 'group_vacancies.'], function () {
        Route::get('/', 'VacanciesController@group')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'VacanciesController@group_edit')->name('edit');
    });
    Route::group(['prefix' => 'vacancies', 'as' => 'vacancies.'], function () {
        Route::match(['get', 'post'], '/edit/{id?}', 'VacanciesController@edit')->name('edit');
    });

    Route::group(['prefix' => 'banners', 'as' => 'banners.'], function () {
        Route::get('/', 'BannersController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'BannersController@edit')->name('edit');
    });

    Route::group(['prefix' => 'achievements', 'as' => 'achievements.'], function () {
        Route::get('/', 'AchievementsController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'AchievementsController@edit')->name('edit');
    });


    Route::group(['prefix' => 'doctors_card', 'as' => 'doctors_card.'], function () {
        Route::get('/', 'DoctorsCardsController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'DoctorsCardsController@edit')->name('edit');
    });

    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('/', 'FaqController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'FaqController@edit')->name('edit');
    });


    Route::group(['prefix' => 'tiles', 'as' => 'tiles.'], function () {
        Route::get('/', 'TilesController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'TilesController@edit')->name('edit');
    });

    Route::group(['prefix' => 'tileedit', 'as' => 'tileedit.'], function () {
        Route::match(['get', 'post'], '/edit/{id?}', 'TilesController@tileEdit')->name('edit');
    });


    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
        Route::get('/', 'GalleryController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'GalleryController@edit')->name('edit');
    });

    Route::group(['prefix' => 'addresses', 'as' => 'addresses.'], function () {
        Route::get('/', 'AddressesController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'AddressesController@edit')->name('edit');
    });

    Route::group(['prefix' => 'subway', 'as' => 'subway.'], function () {
        Route::get('/', 'SubwayController@index')->name('index');
        Route::match(['get', 'post'], '/edit/{id?}', 'SubwayController@edit')->name('edit');
    });
});
