<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function Feedback(){
        return $this->$this->hasMany('App\Feedback');
    }
}
