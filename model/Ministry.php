<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ministry extends Model
{
    protected $table = 'ministries';

    /********************************************
     * 
     * Each Ministry can have many requests
     * (one-to-many relationship)
     * 
     ********************************************/
    public function requests()
    {
        return $this->hasMany('App\Request');
    }


}
