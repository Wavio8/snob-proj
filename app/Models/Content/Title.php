<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table = 'title';

    public $fillable = [
        'title',
        'text',
        'subtext',
        'button',
    ];



}
