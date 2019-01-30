<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use App\Model\Quiz;
use App\Model\User;
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

    public function tag($id)
    {
        return view('admin/tag');
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

            // Redirection vers l'interface admin
            return redirect()->route('admin_interface');
        }

        return view('admin/quiz', [
            'currentQuiz' => $currentQuiz,
            'users' => $users
        ]);
    }

    public function question($id)
    {
        return view('admin/question');
    }
}