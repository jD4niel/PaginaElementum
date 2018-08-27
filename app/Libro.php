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
        'collection_id',
        'agno',
        'imagen'
    ];
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    public function editorial(){
        return $this->belongsTo(Collection::class);
    }
}
