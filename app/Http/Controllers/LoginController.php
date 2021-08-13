<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;

class LoginController extends Controller
{
    
    function LoginUser(Request $request){

        $mobile = $request->input('mobile');
        $password = $request->input('password');

        $user = User::where(['mobile'=>$mobile, 'password'=>$password])->get();

        // var_dump($user);


        if(count($user)>0){ // should check empty or not

            $uid = $user[0]->id;
            $type = "login" ;
            $details = "User logged in" ;
            
            // ActivityLogModel::insert([

            //     'u_id' => $uid,
            //     'date' => $date,
            //     'activity' => $status

            // ]);
            $activity = new Activity();

            $activity->user_id = $uid;
            $activity->type = $type;
            $activity->details = $details;

            $activity->save();

            $response = $user[0];
            //var_dump($uid);
            return $response;

        }
            
        else{

            return 'Incorrect mobile number or password!'; 
        }
               

    }


}
