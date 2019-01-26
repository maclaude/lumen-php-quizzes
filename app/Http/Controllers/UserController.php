<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Quiz;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function signup()
    {
        return view('user/signup');
    }

    public function signin()
    {
        return view('user/signin');
    }

    public function logout()
    {
        return view('user/signin');
    }

    public function profile()
    {
        $quizzes = Quiz::all();
        $users = User::all();

        return view('user/profile', [
            'quizzes' => $quizzes,
            'users' => $users
        ]);
    }
}
