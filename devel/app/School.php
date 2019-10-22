<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // Relation
    public function City(){
        return $this->belongsTo('App\City');
    }
    public function Mobility(){
        return $this->$this->hasMany('App\Mobility');
    }
}
