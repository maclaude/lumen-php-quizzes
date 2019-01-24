<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Model\Quiz;
use App\Model\AppUser;
use App\Model\Question;
use App\Model\Level;

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
        $count = Question::where('quizzes_id', $id)->count();
        $levels = Level::all();

        return view('quiz', 'quizGame', [
            'quiz' => $quiz,
            'appUsers' => $appUsers,
            'questions' => $questions,
            'count' => $count,
            'levels' => $levels,
        ]);
    }
    
    public function quizgame($id)
    {
        $quiz = Quiz::find($id);
        $appUsers = AppUser::all();
        $questions = DB::select("SELECT * FROM questions WHERE quizzes_id = $id");
        $count = Question::where('quizzes_id', $id)->count();
        $levels = Level::all();

        return view('quizGame', [
            'quiz' => $quiz,
            'appUsers' => $appUsers,
            'questions' => $questions,
            'count' => $count,
            'levels' => $levels,
        ]);
    }
}
