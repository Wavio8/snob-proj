<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    public $fillable = [
        'name',
        'alt',
        'path',
        'thumbnail',
        'rating',
        'ownerType',
        'ownerID',
    ];
}
