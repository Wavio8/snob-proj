<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Subway extends Model
{
    protected $table = 'subways';

    public $fillable = [
        'name',
        'neighbourID',
        'color',
        'rating',

    ];

    function childrens()
    {
        return  Subway::where('neighbourID', $this->id)->get();
    }
}
