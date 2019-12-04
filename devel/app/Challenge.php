<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Challenge extends Model
{
    use Notifiable;

    protected $fillable = [
        'mobility_id', 'name', 'description', 'capacity', 'start', 'end',
    ];

    // Relation
    public function School(){
        return $this->belongsToMany('App\School' , 'challenge_schools')->withTimestamps();
    }

    public function Student(){
        return $this->belongsToMany('App\User' , 'student_challenges')->withTimestamps();
    }

    public function Feedback(){
        return $this->$this->hasMany('App\Feedback');
    }

    public function Mobility(){
        return $this->belongsTo('App\Mobility');
    }
}
