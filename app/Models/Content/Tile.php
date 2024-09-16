<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Tile extends Model
{
    protected $table = 'tiles';

    public $fillable = [
        'groupID',
        'name',
        'text',
        'image',
        'hide',
    ];
}