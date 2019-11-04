<?php
namespace core\auth;
use app\models\UserModel;

/**
 * Clase para validar usuarios
 */
class Auth {

    /**
     * Devuelve la contraseña encriptada
     *
     * @param string $password
     * @return string
     */
    static function crypt($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($postPassword, $password, $user) {
        if (password_verify($postPassword, $password)) {
            return true;
        }
        return false;
    }

    /**
     * Comprueba si el usuario está logeado
     *
     * @return boolean
     */
    static function check() {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo $_SESSION['userName'];
            echo "SIIIii ";
            return true;
        } else {
            //var_dump($_SESSION['userName']);
            echo "NOoOo ";
            return false;
        }
    }

}
