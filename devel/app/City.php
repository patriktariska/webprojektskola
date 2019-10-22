<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Relation
    public function States(){
        return $this->belongsTo('App\State');
    }

    public function Schools(){
        return $this->$this->hasMany('App\School');
    }
}
