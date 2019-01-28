<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function quizzes()
    {
        return $this->belongsToMany('App\Model\Quiz', 'quizzes_has_tags', 'quizzes_id', 'tags_id');
    }
}