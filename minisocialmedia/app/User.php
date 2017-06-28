<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password','username','dob'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates=[
        'dob'
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

}
