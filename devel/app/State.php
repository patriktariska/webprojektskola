<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    // Relation
    public function Countries(){
        return $this->belongsTo('App\Country');
    }

    public function Cities(){
        return $this->$this->hasMany('App\City');
    }
}
