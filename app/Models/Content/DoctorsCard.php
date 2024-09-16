<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class DoctorsCard extends Model
{
    protected $table = 'doctors-cards';

    public $fillable = [
        'function',
        'name',
        'text',
    ];
}
