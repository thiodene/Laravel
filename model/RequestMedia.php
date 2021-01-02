<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMedia extends Model
{
    protected $table = 'request_media';

    /********************************************
     * 
     * A Media can have many requests
     * (one-to-many relationship)
     * 
     ********************************************/
    public function requests()
    {
        return $this->hasMany('App\Request');
    }


    /********************************************
     * 
     * A Media can have one Type
     * (one-to-one relationship)
     * 
     ********************************************/
    
    public function type()
    {
        return $this->belongsTo('App\Type','type_id');
    }
    

}
