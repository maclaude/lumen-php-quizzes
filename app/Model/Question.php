<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function level()
    {
        return $this->belongsTo('App\Model\Level', 'levels_id');
    }
}