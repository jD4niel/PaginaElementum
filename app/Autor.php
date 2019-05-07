<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'breve_desc',
        'facebook',
        'twitter',
        'instagram',
        'semblanza',
        'imagen'
    ];
    public function libro(){
        return $this->hasMany(Libro::class);
    }
    public function entrada()
    {
        return $this->hasMany('App\Entradas');
    }
}
