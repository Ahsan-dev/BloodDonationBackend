<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register','RegisterController@RegisterUser');
$router->post('/login','LoginController@LoginUser');
$router->post('/getactivity','ActivityController@getActivity');
$router->post('/writepost','PostController@writeAPost');
$router->get('/getpostfeed','PostController@getPostFeed');
$router->post('/getmyposts','PostController@GetMyPosts');
$router->post('/donationcomplete','PostController@DonationComplete');
$router->post('/getmyacceptors','DonationController@GetMyAcceptors');
$router->post('/acceptpost','PostController@acceptPost');
$router->get('/postsadmintosign','DonationController@postsAdminToSign');
$router->post('/donateconfirm','DonationController@donateConfirm');
$router->post('/admindateassign','DonationController@AdminDateAssign');
$router->post('/getdonationhistory','DonationController@getDonationHistory');
$router->post('/getservicetakenhistory','DonationController@getServiceTakenHistory');
$router->get('/send_email' ,'MailController@mail');
