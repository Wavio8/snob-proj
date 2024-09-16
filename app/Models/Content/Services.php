<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    public $fillable = [
        'title',
        'text',
    ];



}
