<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class FaqVacancies extends Model
{
    protected $table = 'faq__vacancies';

    public $fillable = [
        'vacancyID',
        'faqID',
    ];
}