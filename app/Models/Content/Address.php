<?php

namespace App\Models\Content;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Address extends Model
{
    protected $table = 'addresses';

    public $fillable = [
        'city',
        'address',
        'coordinate',
        'workTime',
        'image',
    ];


    function subways()
    {
        return $this->hasManyThrough(Subway::class, AddressesSubways::class, 'addressID', 'id', '', 'metroID')->get();
    }
    function clear()
    {
        AddressesSubways::where('addressID', $this->id)->delete();

        if ($this->image)
            Storage::disk('public')->delete($this->image);
    }

    function addSubway($metroID)
    {
        $relation = new AddressesSubways();
        $relation->metroID = $metroID;
        $relation->addressID = $this->id;
        $relation->save();
    }

    function removeSubway($metroID)
    {
        if ($relation = AddressesSubways::where('metroID', $metroID)->where('addressID', $this->id)->first()) $relation->delete();
    }
}
