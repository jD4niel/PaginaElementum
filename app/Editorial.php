<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $fillable = [
        'id',
        'nombre'
    ];
    public function libro(){
        return $this->hasMany(Libro::class);
    }
}
