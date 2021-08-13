<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Activity;
use Carbon\Carbon;

class LoginController extends Controller
{
    
    function LoginUser(Request $request){

        $mobile = $request->input('mobile');
        $password = $request->input('password');

        $user = User::where(['mobile'=>$mobile, 'password'=>$password])->get();


        if(count($user)>0){ // should check empty or not

            $uid = $user[0]->id;
            $type = "login" ;
            $details = "User logged in" ;
            

            $activity = new Activity();

            $activity->user_id = $uid;
            $activity->type = $type;
            $activity->details = $details;

            $activity->save();

            $user = new User();
            if($user->find($uid)->donations()->count()==0){

                $days = 0;

            }else{

                $last_date = $user->find($uid)->donations()->latest()->first()->updated_at->toDateString();
                $now = time(); // or your date as well        
                $datediff = $now - strtotime($last_date);
                $days = round($datediff / (60 * 60 * 24));

            }
           


            
            $details = $user->find($uid)->details;
            $bloodGrp = $user->find($uid)->blood_group;
            $userName = $user->find($uid)->user_name;
            $police_station = $user->find($uid)->police_station;
            $district = $user->find($uid)->district;
            $gender = $user->find($uid)->gender;
            $proPic = $user->find($uid)->image;

            $response = array(

                "user_id"=>$uid, 
                "days"=>$days,
                "blood_group"=>$bloodGrp,
                "user_name"=>$userName,
                "gender"=>$gender, 
                "image" => $proPic,
                "details" => $details,
                "police_station" => $police_station,
                "district" => $district

            );

            return $response;    
        }
            
        else{

            return 'Incorrect mobile number or password!'; 
        }
               

    }


}
