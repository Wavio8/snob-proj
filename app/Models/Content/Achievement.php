<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $table = 'achievements';

    public $fillable = [
        'name',
        'image',
        'hide',
    ];
}
