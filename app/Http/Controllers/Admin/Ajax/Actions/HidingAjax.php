<?php

namespace App\Http\Controllers\Admin\Ajax\Actions;

trait HidingAjax
{
    private function adminHide($id, $className, $hide)
    {

        $object = $className::find($id);
        $object->hide = $hide;
        $result = $object->save();

        echo $result ? 'success' : 'error';
    }
}
