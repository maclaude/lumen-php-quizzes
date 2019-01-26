<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Quiz;
use App\Model\User;
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

    public function list()
    {
        $quizzes = Quiz::all();
        $users = User::all();

        return view('quiz/list', [
            'quizzes' => $quizzes,
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $quiz = Quiz::find($id);
        $users = User::all();
        $questions = Question::where('quizzes_id', '=', $id)->get();
        $count = Question::where('quizzes_id', $id)->count();
        $levels = Level::all();

        return view('quiz/show', [
            'quiz' => $quiz,
            'users' => $users,
            'questions' => $questions,
            'count' => $count,
            'levels' => $levels,
        ]);
    }
}
