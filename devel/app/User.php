<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'lname',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);

    }

    // Relations
    public function Roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    public function Challenge(){
        return $this->belongsToMany('App\Challenge' , 'student_challenges')->withTimestamps();
    }
    public function Feeds(){
        return $this->hasMany('App\Feedback');
    }
    public function Logs(){
        return $this->hasMany('App\LogActivity');
    }


    // Method Roles Permisions
    public function hasAnyRoles($roles){
        return null !== $this->Roles()->whereIn('name', $roles)->first();
    }
    public function hasAnyRole($role){
        return null !== $this->Roles()->where('name', $role)->first();
    }
    public function isAdmin()
    {
        foreach ($this->Roles()->get() as $role)
        {
            if ($role->name == 'admin' || $role->name == 'devel')
            {
                return true;
            }
        }
    }
}
