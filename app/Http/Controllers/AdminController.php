<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use App\Model\Quiz;
use App\Model\User;
use App\Model\Level;
use App\Model\Answer;
use App\Model\Question;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function interface() 
    {
        $this->isUserAllowed();

        $quizzes = Quiz::all();
        $questions = Question::all();
        $tags = Tag::all();
        
        return view('admin/interface', [
            'quizzes' => $quizzes,
            'questions' => $questions,
            'tags' => $tags
        ]);
    }

    public function quiz(Request $request, $id)
    {
        $currentQuiz = Quiz::find($id);
        $users = User::all();

        $title = $request->input('title');
        $description = $request->input('description');
        $userId = $request->input('user_id');

        if ($request->isMethod('post')) {

            $title = trim($title);
            $description = trim($description);

            $currentQuiz->title = $title;
            $currentQuiz->description = $description;
            $currentQuiz->app_users_id = $userId;
            $currentQuiz->save();

            // Redirection vers l'interface admin une fois la modification effectuée
            return redirect()->route('admin_interface');
        }

        return view('admin/quiz', [
            'currentQuiz' => $currentQuiz,
            'users' => $users
        ]);
    }

    public function question(Request $request, $id)
    {
        $currentQuestion = Question::find($id);
        $currentQuestionAnswer = Answer::where('questions_id', $id)->first();
        $levels = Level::all();

        $question = $request->input('question');
        $anecdote = $request->input('anecdote');
        $wiki = $request->input('wiki');
        $levelId = $request->input('level_id');
        $answer = $request->input('answer_name');

        if ($request->isMethod('post')) {
            $question = trim($question);
            $anecdote = trim($anecdote);
            $wiki = trim($wiki);
            $answerDescription = trim($answer);

            $currentQuestion->question = $question;
            $currentQuestion->anecdote = $anecdote;
            $currentQuestion->wiki = $wiki;
            $currentQuestion->levels_id = $levelId;
            $currentQuestionAnswer->description = $answerDescription;

            $currentQuestion->save();
            $currentQuestionAnswer->save();

            // Redirection vers l'interface admin une fois la modification effectuée
            return redirect()->route('admin_interface');
        }

        return view('admin/question', [
            'currentQuestion' => $currentQuestion,
            'currentQuestionAnswer' => $currentQuestionAnswer,
            'levels' => $levels
        ]);
    }

    public function tag(Request $request, $id)
    {
        $currentTag = Tag::find($id);

        $name = $request->input('name');
        
        if ($request->isMethod('post')) {
            $name = trim($name);
            
            $currentTag->name = $name;

            $currentTag->save();

            // Redirection vers l'interface admin une fois la modification effectuée
            return redirect()->route('admin_interface');
        }

        return view('admin/tag', [
            'currentTag' => $currentTag
        ]);
    }
}
