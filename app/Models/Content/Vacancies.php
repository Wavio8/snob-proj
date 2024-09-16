<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;

class Vacancies extends Model
{
    protected $table = 'vacancies';

    public $fillable = [
        'name',
        'salary',
        'experience',
        'summary',
        'groupID',
        'rating',
        'hide',
    ];


    function clear() {
        FaqVacancies::where('vacancyID', $this->id)->delete();
        DoctorsCardVacancies::where('vacancyID', $this->id)->delete();
    }




    function faq()
    {
        return $this->hasManyThrough(Faq::class, FaqVacancies::class, 'vacancyID', 'id', '', 'faqID')->get();
    }
    function doctors()
    {
        return $this->hasManyThrough(DoctorsCard::class, DoctorsCardVacancies::class, 'vacancyID', 'id', '', 'cardID')->get();
    }

    function addFaq($faqID)
    {
        $relation = new FaqVacancies();
        $relation->faqID = $faqID;
        $relation->vacancyID = $this->id;
        $relation->save();
    }

    function removeFaq($faqID)
    {
        if ($relation = FaqVacancies::where('faqID', $faqID)->where('vacancyID', $this->id)->first()) $relation->delete();
    }
    function doctorsCards()
    {
        return $this->hasManyThrough(DoctorsCard::class, DoctorsCardVacancies::class, 'vacancyID', 'id', '', 'cardID')->get();
    }


    function addDoc($cardID)
    {
        $relation = new DoctorsCardVacancies();
        $relation->cardID = $cardID;
        $relation->vacancyID = $this->id;
        $relation->save();
    }

    function removeDoc($cardID)
    {
        if ($relation = DoctorsCardVacancies::where('cardID', $cardID)->where('vacancyID', $this->id)->first()) $relation->delete();
    }
   
}
