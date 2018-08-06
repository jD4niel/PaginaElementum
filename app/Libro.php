<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'datos',
        'precio',
        'autor_id',
        'editorial_id'
    ];
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    public function editorial(){
        return $this->belongsTo(Editorial::class);
    }
}
