<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','mobile','alt_mobile', 'email', 'blood_group', 'religion', 'gender', 'division', 'district', 'police_station', 'weight', 'birth_date','image', 'details'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}
