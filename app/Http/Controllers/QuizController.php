<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Model\Quiz;
use App\Model\AppUser;
use App\Model\Question;

class QuizController extends Controller
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

    public function quiz($id)
    {
        $quiz = Quiz::find($id);
        $appUsers = AppUser::all();
        $questions = DB::select("SELECT * FROM questions WHERE quizzes_id = $id");
        
        return view('quiz', [
            'quiz' => $quiz,
            'appUsers' => $appUsers,
            'questions' => $questions
        ]);
    }
}
