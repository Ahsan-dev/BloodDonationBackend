<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Donation extends Model
{
    
    public function usersDonation()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function postDonation()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

}
