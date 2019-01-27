<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function level()
    {
        return $this->belongsTo('App\Model\Level', 'levels_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Model\Answer', 'questions_id');
    }
}