<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';

    public $fillable = [
        'name',
        'position',
        'image',
        'hide',
    ];
}
