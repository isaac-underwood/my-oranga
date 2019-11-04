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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function alcohols()
    {
        return $this->hasMany('App\Alcohol');
    }

    public function moods()
    {
        return $this->hasMany('App\Mood');
    }

    public function sleeps()
    {
        return $this->hasMany('App\Sleep');
    }

    public function snacks()
    {
        return $this->hasMany('App\Snack');
    }

    public function targets()
    {
        return $this->hasMany('App\Target');
    }

    public function weights()
    {
        return $this->hasMany('App\Weight');
    }
}
