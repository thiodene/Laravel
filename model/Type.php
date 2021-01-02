<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    public function parent()
    {
        return $this->belongsTo('App\Type','parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Type','parent_id');
    }
}
