<?php

namespace App\Http\Controllers\Admin\Utility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){

        // if (auth()->user()) {
        //     return redirect()->route('admin.settings.index')->with('message', 'Сначала необходимо выйти из личного кабинета');
        // }

        return view('admin.utility.login');
    }
}
