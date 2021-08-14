<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\User;

class RegisterController extends Controller
{
    
    function RegisterUser(Request $request){

        $user_name = $request->input('user_name');
        $mobile = $request->input('mobile');
        $alt_mobile = $request->input('alt_mobile');
        $email = $request->input('email');
        $blood_group = $request->input('blood_group');
        $religion = $request->input('religion');
        $gender = $request->input('gender');
        $division = $request->input('division');
        $district = $request->input('district');
        $police_station = $request->input('police_station');
        $weight = $request->input('weight');
        $birth_date = $request->input('birth_date');
        $image = $request->input('image');
        $details = $request->input('details');
        $password = $request->input('password');


        // $userCount = UserModel::where('mobile',$mobile)->count();

        // if($userCount>0)

        //     return 'User with this mobile number already exists';

        // }else{

        //     $result = UserModel::insert([

        //         'user_name' => $user_name,
        //         'mobile' => $mobile,
        //         'alt_mobile' => $alt_mobile,
        //         'email' => $email,
        //         'blood_group' => $blood_group,
        //         'religion' => $religion,
        //         'gender' => $gender,
        //         'division' => $division, 
        //         'district' => $district,
        //         'police_station' => $police_station,
        //         'weight' => $weight,
        //         'birth_date' => $birth_date,
        //         'image' => $image,
        //         'details' => $details,
        //         'password' => $password   

        //     ]);

 
        $this->validate($request, [
            'email' => 'email',
            'mobile' => 'required|unique:users',
        ]);

        $user = new User();
        $user->user_name = $user_name;
        $user->mobile = $mobile;
        $user->alt_mobile = $alt_mobile;
        $user->email = $email;
        $user->blood_group = $blood_group;
        $user->religion = $religion;
        $user->gender = $gender;
        $user->division = $division;
        $user->district = $district;
        $user->police_station = $police_station;
        $user->weight = $weight;
        $user->birth_date = $birth_date;
        $user->image = $image;
        $user->details = $details;    
        $user->password = $password;

        $result = $user->save();

            if($result==true){

                return 'Registered';

            }else{

                return 'Failed';

            }


        



    }

}
