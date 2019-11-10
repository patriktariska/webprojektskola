<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mobility extends Model
{
    use Notifiable;

    protected $fillable = [
        'school_id', 'name', 'type', 'description', 'capacity', 'start', 'end',
    ];

    // Relation
    public function School(){
        return $this->belongsTo('App\School');
    }

    public function Feedback(){
        return $this->$this->hasMany('App\Feedback');
    }
}
