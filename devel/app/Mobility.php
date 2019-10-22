<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobility extends Model
{
    // Relation
    public function School(){
        return $this->belongsTo('App\School');
    }

    public function Feedback(){
        return $this->$this->hasMany('App\Feedback');
    }
}
