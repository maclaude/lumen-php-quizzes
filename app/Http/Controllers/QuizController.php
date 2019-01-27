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
        // $users = User::all();

        return view('quiz/list', [
            'quizzes' => $quizzes,
            // Grâce à la jointure plus besoin de retourner les users car ils sont liés à la table quizzes
            // 'users' => $users
        ]);
    }

    public function show($id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where('quizzes_id', '=', $id)->get();
        $questionAnswerList = $this->getRandomizedAnswers($questions);
        $count = Question::where('quizzes_id', $id)->count();

        return view('quiz/show', [
            'quiz' => $quiz,
            'questions' => $questions,
            'questionAnswerList' => $questionAnswerList,
            'count' => $count,
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
