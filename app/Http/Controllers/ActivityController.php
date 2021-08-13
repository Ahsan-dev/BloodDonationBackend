<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;

class ActivityController extends Controller
{
    function getActivity( Request $request){

       $uid = $request->input('id');
       $user = new User();
       $result = $user->find($uid)->activities;

        return $result;
    }
}
