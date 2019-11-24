<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class State extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'country_id',
    ];

    // Relation
    public function Countries(){
        return $this->belongsTo('App\Country');
    }

    public function Cities(){
        return $this->$this->hasMany('App\City');
    }
}
