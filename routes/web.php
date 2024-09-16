<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    include(__DIR__ . '/admin/index.php');
    include(__DIR__ . '/public/index.php');
});
