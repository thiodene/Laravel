<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    /********************************************
     * 
     * A User can have many requests
     * (one-to-many relationship)
     * 
     ********************************************/
    public function requests()
    {
        return $this->hasMany('App\Request');
    }

}
