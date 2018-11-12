<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'nombre',
        'subtitulo',
        'autor_id',
        'user_id',
        'rol_id',
        'collection_id',
        'isbn',
        'tamaño',
        'precio',
        'semblanza',
        'ebook',
        'url',
        'imagen'
    ];
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    public function collection(){
        return $this->belongsTo(Collection::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
