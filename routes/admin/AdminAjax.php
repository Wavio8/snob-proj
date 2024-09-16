<?php

use App\Http\Controllers\Admin\Ajax\AdminAjax;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::post('ajax', function (Request $request) {
        $controller = new AdminAjax();
        $controller($request->action);
    })->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
