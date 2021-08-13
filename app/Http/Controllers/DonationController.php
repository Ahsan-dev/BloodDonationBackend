<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Donation;
use App\Post;
use App\Activity;

class DonationController extends Controller
{
    function postsAdminToSign(){

        $user = new User();
        $post = new Post();
        $donation = new Donation();

        $users = $user->select('id','user_name','image');
        $posts = $post->select('id','details','date');


        $result = $donation->joinSub($users,'users',function($joinusers){

            $joinusers->on('users.id', '=', 'donations.user_id');

        })->joinSub($posts,'posts',function($joinposts){

            $joinposts->on('posts.id', '=', 'donations.post_id');
        })->where('status',"donated")->get();


        return $result;


    }


    function GetMyAcceptors(Request $request){

        $post_id = $request->input('post_id');

        $user = new User();
        $donation = new Donation();
        
        $users = $user->select('id','user_name','image','police_station','district','mobile');

        $result = $donation->joinSub($users,'users',function($joinuser){

            $joinuser->on('users.id', '=', 'donations.user_id');


        })->where('post_id', $post_id)->get();

        return $result;

    }


    function donateConfirm(Request $request){

        $donate_id = $request->input('donate_id');
        $status = $request->input('status');

        $donation = new Donation;

        $donation = $donation->find($donate_id);
        if($donation){

            $donation->status = $status;
           $result = $donation->save();
        }
        

        if($result){

            $uid = $donation->find($donate_id)->user_id;
            $type = "donation" ;
            $details = "Donate blood" ;
            

            $activity = new Activity();

            $activity->user_id = $uid;
            $activity->type = $type;
            $activity->details = $details;

            $activity->save();

            return 'donated';

        }else{

            return 'denied';
        }

    }

    function AdminDateAssign(Request $request){

        $donate_id = $request->input('donate_id');
        $date = $request->input('date');

        $donation = new Donation();

        $donation = $donation->find($donate_id);
        if($donation){

            $donation->admin = $date;
           $result = $donation->save();
        }

        if($result){

            return 'assigned';

        }else{

            return 'denied';
        }


    }

    function getDonationHistory(Request $request){

        $uid = $request->input('user_id');

        $donation = new Donation();
        $user = new User();
        $post = new Post();

        $posts = $post->select('id','police_station','district','hospital','blood_grp');
        
       $result = $donation->joinSub($posts,'posts',function($joinpost){

            $joinpost->on('posts.id', '=', 'donations.post_id');

        })->where(['user_id'=>$uid, 'status'=>"donated"])->get();


        return $result;


    }

    function getServiceTakenHistory(Request $request){


        $uid = $request->input('user_id');

        $post = new Post();
        $donation = new Donation();

        $posts = $post->select('id','police_station','district','hospital','blood_grp')->where('user_id',$uid);

        $result = $donation->joinSub($posts,'posts',function($joinposts){

            $joinposts->on('posts.id', '=', 'donations.post_id');

        })->where('status',"donated")->get();
        
        return $result;

    }
}
