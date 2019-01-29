<?php 

namespace App\Utils;

use App\Model\User;

abstract class UserSession 
{
    const SESSION_DATA_NAME = 'currentUser';
    const NO_ROLE_DEFINED = 0;
    const ROLE_ADMIN = 1;

    // Je connecte l'utilisateur
    public static function connect(User $user)
    {
        $_SESSION[self::SESSION_DATA_NAME] = $user;

        return true;
    }

    // Je déconnecte l'utilisateur
    public static function disconnect()
    {
        unset($_SESSION[self::SESSION_DATA_NAME]);

        return true;
    }

    // Je vérifie si l'utilisateur est bien connecté
    public static function isConnected()
    {
        return isset($_SESSION[self::SESSION_DATA_NAME]);
    }

    // Je récupère l'utilisateur si il est bien connecté
    public static function getUser()
    {
        if (self::isConnected()) {
            return $_SESSION[self::SESSION_DATA_NAME];
        }

        return false;
    }

    // Je récupère l'id du role de mon utilisateur
    public static function getRoleId()
    {
        if(self::isConnected()){
            return self::getUser()->role_id;
        }

        return self::NO_ROLE_DEFINED;
    }

    // Je vérifie si mon utilisateur à le role d'administrateur ou non
    public static function isAdmin()
    {
        return (self::getRoleId() == self::ROLE_ADMIN);
    }
}