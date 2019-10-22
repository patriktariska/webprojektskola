<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Relations
    public function States(){
        return $this->$this->hasMany('App\State');
    }
}
