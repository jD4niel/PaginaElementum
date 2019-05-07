<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'type',
        'module',
        'description'
    ];

    /**
     * Get the user record associated with the role.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
