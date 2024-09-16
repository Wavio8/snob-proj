<?php

namespace App\Models\Utility;

use App\Models\Content\Images;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';

    public $fillable = [
        'url',
        'title',
        'text',
        'rating',
        'hide',
    ];

    public function detect()
    {
        $path = $this->request::path();

        if (!$path)
            return $this->model::where('page_code', 'main')->first();
        else
            $url = explode('/', $path)[0];

        return $this->model::where('url', $url)->first();
    }


    function images()
    {
        return Images::where('ownerID', $this->id)->where('ownerType', 'PAGE')->orderBy('rating', 'desc')->get();
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
