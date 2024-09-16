<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Admin\Ajax\Actions\HidingAjax;
use App\Http\Controllers\Admin\Ajax\FileManagment\ImagesAjax;
use App\Http\Controllers\Admin\Ajax\LegacyAjax;

use App\Http\Controllers\Admin\Ajax\Actions\SortingAjax;
use App\Http\Controllers\Controller;



class AdminAjax extends Controller
{
    use ImagesAjax;
    use SortingAjax;
    use HidingAjax;
    use LegacyAjax;
    public function __invoke()
    {
        if (auth()->user()->isAdmin() && !empty($_POST)) {
            $action = array_shift($_POST);
            call_user_func_array([$this, $action], $_POST);
        } else {
            //            $error = new Error();
            //            $error();
        }
        return true;
    }
}
