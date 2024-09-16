<?php

namespace App\Models\Content;


use App\Models\Utility\Page;
use Illuminate\Database\Eloquent\Model;

class TilesGroup extends Model
{
    protected $table = 'tiles-groups';

    public $fillable = [
        'type',
        'name',
        'pageID',
    ];


    function page()
    {
        if ($this->pageID)
            return $this->belongsTo(Page::class, 'pageID', 'id')->first();
        else {
            $main = new Page();
            $main->url = '';
            return $main;
        }
    }
    function tiles(bool $all = false)
    {
        if ($all)
            return $this->hasMany(Tile::class, 'groupID')->get();
        return $this->hasMany(Tile::class, 'groupID')->where('hide', '<>', 1)->get();
    }
}
