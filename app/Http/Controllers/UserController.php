<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Quiz;
use App\Model\AppUser;

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
        return view('signup');
    }

    public function signin()
    {
        return view('signin');
    }

    public function logout()
    {
        return view('signin');
    }

    public function profile()
    {
        $quizzes = Quiz::all();
        $appUsers = AppUser::all();

        return view('userAccount', [
            'quizzes' => $quizzes,
            'appUsers' => $appUsers
        ]);
    }
}
