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
    public function Challenge(){
        return $this->belongsToMany('App\Challenge' , 'challenge_schools');
    }
}
