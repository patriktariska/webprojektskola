<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table='log_activity';

    protected $fillable = [
        'user_id', 'subject', 'url', 'method', 'ip', 'agent'
    ];

    // Relation
    public function User(){
        return $this->belongsTo('App\User');
    }
}
