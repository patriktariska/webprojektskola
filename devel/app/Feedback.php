<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    // Relation
    public function Mobility(){
        return $this->belongsTo('App\Mobility');
    }

    public function Student(){
        return $this->belongsTo('App\Student');
    }
}
