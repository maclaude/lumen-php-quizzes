<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Quiz;
use App\Model\User;
use App\Model\Question;
use App\Model\Answer;
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
        $user = User::find($quiz->app_users_id);
        $questions = Question::where('quizzes_id', '=', $id)->get();
        $questionAnswerList = $this->getRandomizedAnswers($questions);
        $count = Question::where('quizzes_id', $id)->count();
        $levels = Level::all();
        
        // initialisation de l'array vide.
        $levelList = [];
        // Indexation de l'array avec la clé primaire (index) de chaque niveau et le nom comme valeur
        foreach($levels as $level) {
            $levelList[$level->id] = $level->name;
        }

        return view('quiz/show', [
            'quiz' => $quiz,
            'user' => $user,
            'questions' => $questions,
            'questionAnswerList' => $questionAnswerList,
            'count' => $count,
            'levelList' => $levelList
        ]);
    }

    public function getRandomizedAnswers($questions)
    {
        $questionAnswerList = [];

        foreach($questions as $question) {
            $answers = Answer::where('questions_id', '=', $question->id)->get()->shuffle();

            $questionAnswerList[$question->id]= $answers;
        }
        
        return $questionAnswerList;
    }
}
