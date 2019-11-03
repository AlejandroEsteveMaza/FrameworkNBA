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
        if (isset($_POST['submit'])) {
            $user = Input::str($_POST['user']);
            $password = Input::str($_POST['password']);
        }

        $campos = ["user","password","password2"];
        $camposPOST = array_keys($_POST);

        if (Input::check($campos, $camposPOST) && $password === $password2) {
            $password = Auth::crypt($password);
            $this->createUser($user, $password);
        }else{
            $this->renderView('registro');
        }
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