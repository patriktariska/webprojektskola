<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mobility extends Model
{
    use Notifiable;

    
    protected $fillable = [
        'type', 'desc',
    ];

    // Relation
    public function Challenge(){
        return $this->hasMany('App\Challenge');
    }
}
