<?php

namespace App\Models\Content;


use App\Models\Content\Images;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    protected $table = 'gallery';

    public $fillable = [
        'type',
        'name',
        'title',
    ];
    function images()
    {
        return Images::where('ownerID', $this->id)->where('ownerType', 'GALLERY')->orderBy('rating','desc')->get();
    }

    function clear()
    {
        foreach ($this->images()  as $key => $image) {
            if ($image->path)
                Storage::disk('public')->delete($image->path);
            if ($image->thumbnail)
                Storage::disk('public')->delete($image->thumbnail);
            $image->delete();
        }
    }
}
