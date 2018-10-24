<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'apellido_p',
        'apellido_m',
        'foto',
        'breve_desc',
        'facebook',
        'twitter',
        'instagram',
        'semblanza'
    ];
    public function libro(){
        return $this->hasMany(Libro::class);
    }
}
