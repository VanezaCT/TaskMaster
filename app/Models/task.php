<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    protected $fillable = [
        'user_id',
        'titulo',
        'descripcion',
        'fecha_vencimiento',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
