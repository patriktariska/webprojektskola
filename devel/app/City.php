<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class City extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'state_id',
    ];

    // Relation
    public function States(){
        return $this->belongsTo('App\State');
    }

    public function Schools(){
        return $this->$this->hasMany('App\School');
    }
}
