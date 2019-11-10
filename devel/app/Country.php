<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use Notifiable;

    protected $fillable = [
        'code', 'name', 'phonecode',
    ];

    // Relations
    public function States(){
        return $this->$this->hasMany('App\State');
    }
}
