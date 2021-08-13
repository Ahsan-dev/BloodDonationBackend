<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Donation;

class PostController extends Controller
{
    
    function writeAPost(Request $request){

        $user_id = $request->input('user_id');
        $details = $request->input('details');
        $blood_grp = $request->input('blood_grp');
        $relation = $request->input('relation');
        $police_station = $request->input('police_station');
        $hospital = $request->input('hospital');
        $district = $request->input('district');
        $mobile = $request->input('mobile');
        $date = $request->input('date');
        $time_frame = $request->input('time_frame');
        $status = $request->input('status');


        $post = new Post();
        $post->user_id = $user_id;
        $post->details = $details;
        $post->blood_grp = $blood_grp;
        $post->relation = $relation;
        $post->police_station = $police_station;
        $post->hospital = $hospital;
        $post->district = $district;
        $post->mobile = $mobile;
        $post->date = $date;
        $post->time_frame = $time_frame;
        $post->status = $status;

        $result = $post->save();

        if($result){

            return 'Posted successfully..';

        }else{

            return 'Fail to post. Try again!';
        }

    }

    function getPostFeed(){

        $user = new User();

        $subUser = $user->select('id','user_name','image');

        $post = new Post;

        $result = $post->joinSub($subUser,'users',function($join){

            $join->on('users.id', '=', 'posts.user_id');
        })->where('status',"pending")->get();

        return $result;
            

    }


    function acceptPost(Request $request){

        $post_id =  $request->input('post_id');
        $user_id =  $request->input('user_id');
        $status =  $request->input('status');
        $admin =  $request->input('admin');

        $donation = new Donation();

        $donation->post_id = $post_id;
        $donation->user_id = $user_id;
        $donation->status = $status;
        $donation->admin = $admin;

        $result = $donation->save();

        if($result){

            return 'accepted';

        }else{

            return 'denied';

        }

    }

    function GetMyPosts(Request $request){

        $uid = $request->input('id');

        $user = new User();

        $result = $user->find($uid)->posts;

        return $result;

    }

    function DonationComplete(Request $request){

        $post_id = $request->input('post_id');
        $status = $request->input('status');

        $post = new Post();

        $post = $post->find($post_id);
        if($post){

            $post->status = $status;
           $result = $post->save();
        }

        if($result){

            return 'donated';

        }else{

            return 'denied';
        }


    }


}
