<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function questions()
    {
        return $this->hasMany('App\Model\Question', 'levels_id');
    }
}