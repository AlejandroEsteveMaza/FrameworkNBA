<?php
namespace core\auth;
use app\models\UserModel;
use core\JWT\JWT;
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
    static function passwordVerify($postPassword, $password) {
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
        $key = $GLOBALS["config"]["JWT"]["key"];
        if (isset($_COOKIE["DWS_framework"])) {
            if (JWT::decode($_COOKIE["DWS_framework"], $key, array('HS256'))) {
               return true;
            }
        }else{
            return false;
        }
        
        /*  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_COOKIE["DWS_framework"] == session_id()) {
            
            return true;
        } else {
           
            return false;
        } */
    }

}
