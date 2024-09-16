<?php

namespace App\Http\Controllers\Admin\Ajax\Actions;

use App\Models\Content\Images;

trait SortingAjax
{
    private function changeGalleryRating($id, $value)
    {

        $value = (int)$value;

        if ($value == 0) $value = 0;

        $image = Images::find($id);

        if ($image) {

            $image->rating = $value;
            $image->save();

            echo 'success';
        } else {
            echo 'error';
        }
    }
}
