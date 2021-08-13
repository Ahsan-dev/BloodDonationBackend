<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'u_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
