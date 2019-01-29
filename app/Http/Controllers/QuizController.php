<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Quiz;
use App\Model\Question;
use Illuminate\Http\Request;

// Grâce aux jointures plus besoin d'importer les models User / Level / Answers car ils sont déjà liés aux tables correspondantes.

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $quizzes = Quiz::all();

        return view('quiz/list', [
            'quizzes' => $quizzes,
        ]);
    }

    public function show(Request $request, $id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where('quizzes_id', '=', $id)->get();
        $questionAnswerList = $this->getRandomizedAnswers($questions);
        $count = Question::where('quizzes_id', $id)->count();

        // Initialisation des variables
        $score = 0;
        $userAnswerCorrect = [];
        
        if ($request->isMethod('post')) {

            foreach ($questions as $question) {
                $userAnswer = $request->input('radio-question-' . $question->id);
                $questionAnswer = $question->answers_id;

                if ($userAnswer == $questionAnswer) {
                    // Incrémentation à chaque fois que la réponse de l'utilisateur est bonne
                    $score += 1;
                    $userAnswerCorrect[$question->id] = true; 
                } else {
                    $userAnswerCorrect[$question->id] = false; 
                }
            }
        }

        return view('quiz/show', [
            'quiz' => $quiz,
            'questions' => $questions,
            'questionAnswerList' => $questionAnswerList,
            'count' => $count,
            'score' => $score,
            'userAnswerCorrect' => $userAnswerCorrect
        ]);
    }

    public function getRandomizedAnswers($questions)
    {
        $questionAnswerList = [];

        foreach($questions as $question) {

            $answers = $question->answers->shuffle();
            $questionAnswerList[$question->id]= $answers;

        }
        
        return $questionAnswerList;
    }
}
