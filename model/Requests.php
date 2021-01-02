<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Type;
use App\Ministry;
use App\User;

class Requests extends Model
{
    protected $table = 'requests';
    protected $guarded = ['id'];

    /********************************************
     * 
     * Each Request belongs to one user
     * (many-to-one relationship)
     * 
     ********************************************/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /********************************************
     * 
     * Each Request belongs to one request type
     * (many-to-one relationship)
     * 
     ********************************************/
    public function request_type()
    {
        return $this->belongsTo('App\Type','request_type_id');
    }

    public function requestor_team()
    {
        return $this->belongsTo('App\Type','requestor_team_type_id');
    }

    public function required_language()
    {
        return $this->belongsTo('App\Type','required_language_type_id');
    }

    /********************************************
     * 
     * Each Request belongs to one Ministry
     * (many-to-one relationship)
     * 
     ********************************************/

    public function ministry()
    {
        return $this->belongsTo('App\Ministry','ministry_id'); 
    }

}
