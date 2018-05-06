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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $table="users";
     public function ta7akoums() {
        return $this->hasMany('App\Ta7akoum');
    }
    public function tasjil_elyawms() {
        return $this->hasMany('App\Tasjil_elyawm');
    }
    public function traductions() {
        return $this->hasMany('App\Traduction');
    }
    public function tamache9s() {
        return $this->hasMany('App\Tamache9');
    }

}
