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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

$router->get('/', [
    'as' => 'quiz_list',
    'uses' => 'QuizController@list',
]);

$router->get('/quiz/{id}', [
    'as' => 'quiz_show',
    'uses' => 'QuizController@show'
]);

$router->post('/quiz/{id}', [
    'as' => 'quiz_show',
    'uses' => 'QuizController@quiz'
]);

$router->get('/signup', [
    'as' => 'user_signup',
    'uses' => 'UserController@signup',
]);
 
$router->post('/signup', [
    'as' => 'user_signup',
    'uses' => 'UserController@signup',
]);

$router->get('/signin', [
    'as' => 'user_signin',
    'uses' => 'UserController@signin',
]);
 
$router->post('/signin', [
    'as' => 'user_signin',
    'uses' => 'UserController@signin',
]);

$router->get('/logout', [
    'as' => 'user_logout',
    'uses' => 'UserController@logout',
]);

$router->get('/account', [
    'as' => 'user_profile',
    'uses' => 'UserController@profile'
]);