<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class AdminAccessRights extends Model
{
    protected $table = 'admin_access_rights';

    public $fillable =  [
        'path',
        'type',
        'user_class_id'
    ];

    public $types = [
        'read' => 'Чтение',
        'edit' => 'Редактирование',
        'delete' => 'Удаление'
    ];
}
