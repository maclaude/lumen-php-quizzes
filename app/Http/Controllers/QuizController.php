<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Tag;
use App\Model\Quiz;
use App\Utils\Mailer;
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

    public function listByTag($tagId)
    {
        $currentTag = Tag::find($tagId);

        return view('quiz/listByTag', [
            'currentTag' => $currentTag,
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
            
            $mailer = new Mailer();

            //Note : Mettre l'email de votre choix et ne pas oublier de configurer les constantes de .env
            $mailer->setTo('claude.marcantoine2@gmail.com');
            $mailer->setSubject('Votre participation au jeu oQuiz : '. $quiz->title);
            $mailer->setBody('Votre score est de ' . $score . ' / '. $count);

            $mailer->sendMail(); //envoi du mail
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
