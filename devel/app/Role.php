<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relations
    public function Users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
