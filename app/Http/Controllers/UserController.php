<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Quiz;
use App\Model\User;
use App\Utils\UserSession;
use Illuminate\Http\Request;

class UserController extends Controller
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

    public function signup(Request $request)
    {
        $errorList = [];

        // Récupération des valeurs des champs du formulaire
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password = $request->input('password');
        $passwordConfirm = $request->input('password-confirm');

        if ($request->isMethod('post')) {

            // Suppression des espaces avant et après la chaine de caractère
            $firstname = trim($firstname);
            $lastname = trim($lastname);
            $email = trim($email);
            $password = trim($password);
            $passwordConfirm = trim($passwordConfirm);

            if (empty($firstname)) {
                $errorList[] = 'Le prénom est vide';
            }

            if (empty($lastname)) {
                $errorList[] = 'Le nom est vide';
            }

            if (empty($email)) {
                $errorList[] = 'L\'email est vide';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'L\'email renseigné est incorrect';
            }

            if (empty($password)) {
                $errorList[] = 'Le mot de passe est vide';
            } elseif (strlen($password) < 8) {
                $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
            }

            if (empty($passwordConfirm)) {
                $errorList[] = 'La confirmation du mot de passe est vide';
            } elseif ($password != $passwordConfirm) {
                $errorList[] = 'La confirmation du mot de passe n\'est pas valide';
            }

            if (empty($errorList)) {
                // Vérification si un compte avec cet email existe déjà
                $user = User::where('email', '=', $email)->first();

                if ($user) {
                    $errorList[] = 'Un compte avec cet email existe déjà';
                } else {
                    // Encryptage du mot de passe
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Save du nouvel utilisateur
                    $newUser = new User();
                    $newUser->firstname = $firstname;
                    $newUser->lastname = $lastname;
                    $newUser->email = $email;
                    $newUser->password = $hashedPassword;
                    $newUser->save();

                    // Redirection vers la page de connexion
                    return redirect()->route('user_signin');
                }
            }
        }

        return view('user/signup', [
            'errorList' => $errorList,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email
        ]);
    }

    public function signin(Request $request)
    {
        $errorList = [];

        // Récupération des valeurs des champs du formulaire
        $email = $request->input('email');
        $password = $request->input('password');

        if ($request->isMethod('post')) {
            
            // Suppression des espaces avant et après la chaine de caractère
            $email = trim($email);
            $password = trim($password);

            if (empty($email) ||
                filter_var($email, FILTER_VALIDATE_EMAIL) === false ||
                empty($password) ) 
            {
                $errorList[] = 'Identifiant et/ou mot de passe incorrect';
            }


            if (empty($errorList)) {
                // Vérification si un compte avec cet email existe déjà
                $user = User::where('email', '=', $email)->first();

                if ($user) {
                    // Vérification que le mot de passe correspond au hachage
                    if (password_verify($password, $user->password)) {
                        // Connexion de l'utilisateur en session
                        UserSession::connect($user);
                        // Redirection vers la home
                        return redirect()->route('quiz_list');
                    }

                } else {
                    $errorList[] = 'Identifiant et/ou mot de passe incorrect';
                }
            }
        }

        return view('user/signin', [
            'errorList' => $errorList,
            'email' => $email
        ]);
    }

    public function logout()
    {
        // Deconnexion de l'utilisateur en session
        UserSession::disconnect();
        // Redirection vers la home
        return redirect()->route('quiz_list');
    }
}
