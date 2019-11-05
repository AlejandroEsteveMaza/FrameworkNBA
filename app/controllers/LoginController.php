<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;

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
        //if (isset($_POST['submit'])) {
        $user = $_POST['user'];
        //$password = $_POST['password'];

        //echo ($user);
        //}

        $campos = ["user", "password"];
        $camposPOST = array_keys($_POST);
        $usuario = UserModel::where('usuario', '=', $user)->get();

        if (Input::check($campos, $camposPOST) && count($usuario)!=0) {
            
            $usuario = $usuario[0];

            echo "<pre>";
            var_dump($usuario);


            if (Auth::passwordVerify($_POST['password'], $usuario["password"], $usuario["usuario"])) {
                
                $this->setSession($usuario);
            //$this->renderView('inicio');
                header("Location:" . $GLOBALS["config"]["site"]["root"] . "/");
            }else{
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
        session_unset();
        session_destroy();
        setcookie('DWS_framework', "" , time() -3600);
        header("Location:" . $GLOBALS["config"]["site"]["root"] . "/");
        //$this->renderView('inicio');
    }

    /**
     * Crea la cookie y le pasa el id de la sesión
     *
     * @param array $usuario
     * @return void
     */
    private function setSession($usuario)
    {
        //echo  $usuario["usuario"];
        //echo $_POST['password'] ." --- ".$usuario["password"]."<br>";
        //var_dump(password_verify($_POST['password'], $usuario["password"]));

        //if (password_verify($_POST['password'], $usuario["password"])) {
        //session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $usuario["usuario"];
        $_SESSION['avatar'] = $usuario["avatar"];
        
        //Auth::check();
        setcookie('DWS_framework', session_id(), time() + (60 * 60 * 24 * 5));
        // }


    }
}
