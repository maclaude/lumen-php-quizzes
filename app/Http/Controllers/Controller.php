<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Utils\UserSession;

// Controller est le parent de tous les controllers enfants.
// Tous les enfants hériteront donc du comportement (des méthodes) de ce parent

class Controller extends BaseController
{
    public function __construct()
    {
        View::share('isConnected', UserSession::isConnected());
        View::share('currentUser', UserSession::getUser());
        View::share('isAdmin', UserSession::isAdmin());
    }

    public function isUserAllowed()
    {
        if(!UserSession::isConnected()) {
            header('Location: ' . route('user_signin') . '');
            exit();
        } elseif(!UserSession::isAdmin()) {
            abort(403, 'Accès non autorisé');
        }
    }
}
