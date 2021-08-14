<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail() {
        $data = array('name'=>"Arunkumarssss");
        Mail::send('mail', $data, function($message) {
        $message->to('anikamim177@gmail.com', 'Anika')->subject('Test Mail from Blood Donor');
        $message->from('ahsanshantanur@gmail.com','Md Ahsanul Haque Shantanur');
        });
        return "Email Sent. Check your inbox.";
    }
}
