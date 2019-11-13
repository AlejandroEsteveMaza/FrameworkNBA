<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;
use core\JWT\JWT;

/**
 * Clase para el login de usuarios
 */
class LoginController extends Controller
{
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
    public function ValidateAction()
    {
      
        $user = $_POST['user'];
       
        $campos = ["user", "password"];
        $camposPOST = array_keys($_POST);
        $usuario = UserModel::where('usuario', '=', $user)->get();

        if (Input::check($campos, $camposPOST) && count($usuario) != 0) {

            $usuario = $usuario[0];

            if (Auth::passwordVerify($_POST['password'], $usuario["password"])) {

                $this->setSession($usuario);
               
                header("Location:" . $GLOBALS["config"]["site"]["root"] . "/");
            } else {
                $this->renderView('login');
            }
        } else {
            $this->renderView('login');
        }
    }

    /**
     * Destruye la sesión y borra la cookie
     *
     * @return void
     */
    public function LogoutAction()
    {
        setcookie('DWS_framework', "", time() - 3600);
        header("Location:" . $GLOBALS["config"]["site"]["root"] . "/");
    }

    /**
     * Crea la cookie y le pasa el id de la sesión
     *
     * @param array $usuario
     * @return void
     */
    private function setSession($usuario)
    {
        $jwt = Auth::createToken($usuario);
        setcookie('DWS_framework', $jwt, time() + (60 * 60 * 24 * 5));
    }
}
