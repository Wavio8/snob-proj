<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table = 'banners';

    public $fillable = [
        'type',
        'name',
        'title',
        'text',
        'qute',
        'image',
    ];


}
