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
    }

    /**
     * Verifica que el usuario y la contraseña sea correcta
     *
     * @param [type] $password
     * @param [type] $idUser
     * @return boolean
     */
    static function passwordVerify($password, $idUser) {
    }

    /**
     * Comprueba si el usuario está logeado
     *
     * @return boolean
     */
    static function check() {
    }

}
