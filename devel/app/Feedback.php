<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Feedback extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id', 'challenge_id', 'comment', 'photo', 'rate', 'published',
    ];

    // Relation
    public function Challenge(){
        return $this->belongsTo('App\Challenge');
    }

    public function Student(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
