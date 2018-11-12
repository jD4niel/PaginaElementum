<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function entradas()
    {
        return $this->belongsTo('App\Entradas');
    }
}
