<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestWork extends Model
{
    protected $table = 'request_works';

    /********************************************
     * 
     * A Work Request can have many requests
     * (one-to-many relationship)
     * 
     ********************************************/
    public function requests()
    {
        return $this->hasMany('App\Request');
    }


    /********************************************
     * 
     * A Work Request can have one Type
     * (one-to-one relationship)
     * 
     ********************************************/
    
    public function type()
    {
        return $this->belongsTo('App\Type','work_type_id');
    }
    

}
