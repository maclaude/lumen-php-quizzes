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
    'uses' => 'QuizController@show'
]);

$router->get('/admin', [
    'as' => 'admin_interface',
    'uses' => 'AdminController@interface'
]);

$router->get('/admin/tag/{id}', [
    'as' => 'admin_tag',
    'uses' => 'AdminController@tag'
]);

$router->post('/admin/tag/{id}', [
    'as' => 'admin_tag',
    'uses' => 'AdminController@tag'
]);

$router->get('/admin/quiz/{id}', [
    'as' => 'admin_quiz',
    'uses' => 'AdminController@quiz'
]);

$router->post('/admin/quiz/{id}', [
    'as' => 'admin_quiz',
    'uses' => 'AdminController@quiz'
]);

$router->get('/admin/question/{id}', [
    'as' => 'admin_question',
    'uses' => 'AdminController@question'
]);

$router->post('/admin/question/{id}', [
    'as' => 'admin_question',
    'uses' => 'AdminController@question'
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

$router->get('/{id}', [
    'as' => 'quiz_list_by_tag',
    'uses' => 'QuizController@listByTag',
]);
