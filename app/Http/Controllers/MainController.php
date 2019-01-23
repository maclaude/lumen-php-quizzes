<?php

namespace App\Http\Controllers;

// Importation de ma classe DB
use Illuminate\Support\Facades\DB;

// Importation des mes models
use App\Model\Quiz;
use App\Model\AppUser;

class MainController extends Controller
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

    public function home()
    {
        $quizzes = Quiz::all();
        $appUsers = AppUser::all();

        return view('home', [
            'quizzes' => $quizzes,
            'appUsers' => $appUsers
        ]);
    }
}
