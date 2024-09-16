<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';

    public $fillable = [
        'title',
        'text',
        'company',
        'logo',
        'qute',
        'date',
        'image',
    ];


}
