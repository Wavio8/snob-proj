<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    public $fillable = [
        'type',
        'name',
    ];

    function items()
    {
        return MenuItem::where('menuID', $this->id)->get();
    }
}
