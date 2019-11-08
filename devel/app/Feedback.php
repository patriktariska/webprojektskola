<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Feedback extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'mobility_id', 'comment', 'photo', 'rate', 'published',
    ];

    // Relation
    public function Mobilities(){
        return $this->belongsTo('App\Mobility');
    }

    public function Student(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
