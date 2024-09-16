<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class DoctorsCardVacancies extends Model
{
    protected $table = 'doctors-cards__vacancies';

    public $fillable = [
        'vacancyID',
        'cardID',
    ];
}
