<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    //
    protected $fillable=['texto', 'user_id'];

    public function autor()
    {
        return $this->belongsTo('App\Autor');
    }
}
