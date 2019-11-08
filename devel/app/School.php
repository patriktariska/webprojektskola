<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class School extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'url', 'address', 'postcode', 'city_id'
    ];

    // Relation
    public function City(){
        return $this->belongsTo('App\City');
    }
    public function Mobility(){
        return $this->$this->hasMany('App\Mobility');
    }
}
