<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lien_facebook','lien_instagram',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name', 'email', 'password', 'bannir_user','lien_facebook','lien_instagram',
    ];
    protected $dates = [
        'bannir_user'
    ];


    public function roles()
    {
        return $this->belongsToMany("App\Role")->withTimestamps();
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('nom', "=", $role)->first()) {
            return true;
        }
        return false;
    }


    public function mouves(){
        return $this->hasMany('App\Mouve');
    }


}
