<?php

namespace App\Models\Utility;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
  use HasFactory;

  protected $table = 'settings';

  public $fillable = [
    'phone',
      'phone2',
    'email',
  ];


  function tel(): string
  {
    return Helper::phone($this->phone);
  }
  function pretterPhone(): string
  {
    $phone = explode(')', $this->phone);
    if ($phone && array_key_exists(0, $phone) && array_key_exists(1, $phone)) {
      return $phone[0] . ')' . '<b>' . $phone[1] . '</b>';
    } else {
      return  $this->phone;
    }
  }
}
