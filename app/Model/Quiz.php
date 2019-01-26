<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    // Jointure ORM du champ FK `app_users_id` avec le model User
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'app_users_id');
    }
}