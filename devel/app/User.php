<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relations
    public function Roles(){
        return $this->belongsToMany('App\Role')->withTimestamps();
    }
    public function Feedback(){
        return $this->$this->hasMany('App\Feedback');
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
