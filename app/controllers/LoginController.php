<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;

/**
 * Clase para el login de usuarios
 */
class LoginController extends Controller {
    /**
     * Página donde será redirigido si el registro es correcto
     *
     * @var string
     */
    private $redirect_to = '/';


    /**
     * Comprueba si los datos son correctos
     *
     * @return void
     */
    public function ValidateAction() {
    }

    /**
     * Destruye la sesión y borra la cookie
     *
     * @return void
     */
    public function LogoutAction() {
    }

    /**
     * Crea la cookie y le pasa el id de la sesión
     *
     * @param [type] $userId
     * @return void
     */
    private function setSession($userName) {
    }

}