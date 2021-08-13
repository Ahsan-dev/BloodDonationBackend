<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public function postUsers()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function donationspost()
    {
        return $this->hasMany('App\Donation');
    }

}
