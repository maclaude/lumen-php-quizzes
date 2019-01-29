<?php

namespace App\Http\Controllers;

use App\Model\Quiz;
use App\Model\Question;
use App\Model\Tag;

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
}