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
        'foto'
    ];
    public function libro(){
        return $this->hasMany(Libro::class);
    }
}
