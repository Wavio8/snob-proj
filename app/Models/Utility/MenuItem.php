<?php

namespace App\Models\Utility;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_items';

    public $fillable = [
        'menuID',
        'pageID',
        'name',
        'url',
        'rating',
        'hide',
    ];


    function name()
    {
        if (!$this->name) {
            $page = Page::find($this->pageID);
            if ($page) return $page->name;
        }
        return $this->name;
    }
    function url()
    {
        if (!$this->url) {
            $page = Page::find($this->pageID);
            if ($page) return $page->url;
        }
        return $this->url;
    }
}
