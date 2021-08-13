<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    


}
