<?php

namespace App\Http\Controllers\Admin\Ajax\FileManagment;

use App\Models\Content\Images;
use Illuminate\Support\Facades\Storage;


trait ImagesAjax
{


    private static function delete($path)
    {
        try {
            return Storage::disk('public')->delete($path);
        } catch (\Throwable $th) {
            return false;
        }
    }

    private function imgDelete($id, $className, $path, $field)
    {
        $image = $className::find($id);

        if ($image && !empty($image->$field)) {
            if (static::delete($image->$field)) {
                $image->$field = null;
                $image->save();
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    private function galleryImgDelete($id, $className, $path)
    {
        $image = $className::find($id);

        if ($image) {
            if (!empty($image->path)) {
                if (static::delete($image->path)) {
                    $image->path = null;
                }
            }
            if (!empty($image->thumbnail)) {
                if (static::delete($image->thumbnail)) {
                    $image->thumbnail = null;
                }
            }

            if (!$image->thumbnail && !$image->path) {
                $image->delete();
            } else {
                $image->save();
            }

            echo 'success';
        } else {
            echo 'error';
        }
    }
    private function changeImageAlt($id, $value)
    {
        Images::find($id)->fill(['alt' => $value])->save();
    }
    
}
