<?php

namespace App\Http\Controllers;

// Importation des mes models
use App\Model\Quiz;
use App\Model\User;
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
        //
    }

    public function signup(Request $request)
    {
        $errorList = [];

        if ($request->isMethod('post')) {
            // Récupération des valeurs des inputs du formulaire
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email = $request->input('email');
            $password = $request->input('password');

            // Suppression des espaces avant et après la chaine de caractère
            $firstname = trim($firstname);
            $lastname = trim($lastname);
            $email = trim($email);
            $password = trim($password);

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

                    return redirect()->route('quiz_list');
                }
            }
        }
        return view('user/signup', [
            'errorList' => $errorList
        ]);
    }

    public function signin(Request $request)
    {
        $errorList = [];

        if ($request->isMethod('post')) {
            // Récupération des valeurs des inputs du formulaire
            $email = $request->input('email');
            $password = $request->input('password');

            // Suppression des espaces avant et après la chaine de caractère
            $email = trim($email);
            $assword = trim($password);

            if (empty($email)) {
                $errorList[] = 'Aucun email saisi';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'L\'email renseigné est incorrect';
            }

            if (empty($password)) {
                $errorList[] = 'Aucun mot de passe saisi';
            } elseif (strlen($password) < 8) {
                $errorList[] = 'Le mot de passe renseigné est incorrect';
            }

            if (empty($errorList)) {
                // Vérification si un compte avec cet email existe déjà
                $user = User::where('email', '=', $email)->first();

                if ($user) {
                    // Vérification que le mot de passe correspond au hachage
                    if (password_verify($password, $user->password));

                    // TODO - Mise en session

                    return redirect()->route('quiz_list');
                } else {
                    $errorList[] = 'L\'identifiant et/ou mot de passe incorrect';
                }
            }
        }

        return view('user/signin', [
            'errorList' => $errorList
        ]);
    }

    public function logout()
    {
        return redirect()->route('user_signin');
    }

    public function profile()
    {
        $quizzes = Quiz::all();
        $users = User::all();

        return view('user/profile', [
            'quizzes' => $quizzes,
            'users' => $users
        ]);
    }
}
