<?php

namespace App\Http\Controllers;

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
}
