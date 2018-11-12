<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{
    //
    protected $fillable=['texto'];

    public function blog()
    {
        return $this->hasMany('App\Blog');
    }
}
