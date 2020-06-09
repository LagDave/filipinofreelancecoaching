<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
    }
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('m-d-Y');

    }
    public function proofs(){
        return $this->hasMany('App\Proof');
    }
    public function portfolio(){
        return $this->hasOne('App\Portfolio');
    }
    public function projects(){
        return $this->hasMany('App\Project');
    }

}
