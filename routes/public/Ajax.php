<?php
use Illuminate\Support\Facades\Route;

Route::post('/ajax' , 'PageController@ajax')->name('publicAjax'); 

