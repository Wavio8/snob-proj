<?php
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , 'PageController@index')->name('index'); //Главная

//Route::get('/ind' , 'PageController@ind')->name('index');
//Route::get('/about' , 'PageController@about')->name('about'); //Главная
//Route::get('/vacancies' , 'PageController@vacancies')->name('vacancies'); //Главная
//Route::get('/vacancies/{id}' , 'PageController@vacanciesSingle')->name('vacancy'); //Главная
//Route::get('/culture' , 'PageController@culture')->name('culture'); //Главная
//Route::get('/education' , 'PageController@education')->name('education'); //Главная
//Route::get('/contacts' , 'PageController@contacts')->name('contacts'); //Главная

Route::group(['prefix' => '{url}', 'as' => 'page.' , 'where' => ['url' => '(.*)']], function() {
    Route::get('/', 'PageController@static')->name('index'); //Страницы
});

include('Ajax.php');
