<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    protected $fillable = [
        'user_id',
        'name', // Agrega otros campos que desees permitir para asignación masiva
        'status'
    ];
}
