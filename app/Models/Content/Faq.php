<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';

    public $fillable = [
        'title',
        'text',
        'hide',
    ];
}

