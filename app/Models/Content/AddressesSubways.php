<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class AddressesSubways extends Model
{
    protected $table = 'addresses__subways';

    public $fillable = [
        'addressID',
        'metroID',
    ];
}
