<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';

    public $fillable = [
        'name',
        'phone',
        'email',
        'about',
        'file',
        'vacancyID',
        'isRead',
    ];
}
