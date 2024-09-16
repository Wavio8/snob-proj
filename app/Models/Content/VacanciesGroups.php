<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class VacanciesGroups extends Model
{
    protected $table = 'vacancies_groups';

    public $fillable = [
        'name',
        'rating',
        'hide',
    ];

    function vacancies(bool $all = false)
    {
        if ($all)
            return $this->hasMany(Vacancies::class, 'groupID')->get();
        return $this->hasMany(Vacancies::class, 'groupID')->where('hide', '<>', 1)->get();
    }
}
