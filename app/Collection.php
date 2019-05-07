<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'id',
        'nombre'
    ];
    public function libro(){
        return $this->hasMany(Libro::class);
    }
}
