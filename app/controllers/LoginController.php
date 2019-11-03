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
        //if (isset($_POST['submit'])) {
            $user = $_POST['user'];
            //$password = $_POST['password'];
            
            //echo ($user);
        //}

        $campos = ["user","password"];
        $camposPOST = array_keys($_POST);

        if (Input::check($campos, $camposPOST)) {
            $usuario = UserModel::where('usuario','=', $user)->get();
           
           /*  echo "<pre>";
            var_dump($usuario[0]["password"]); */
            


            $this->setSession($usuario[0]);
           
        }else{
            $this->renderView('login');
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
     * @param array $usuario
     * @return void
     */
    private function setSession($usuario) {

        echo $_POST['password'] ." --- ".$usuario["password"]."<br>";
        var_dump(password_verify($_POST['password'], $usuario["password"]));
        
        if (password_verify($_POST['password'], $usuario["password"])) {
            
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $usuario["usuario"];
            setcookie('DWS_framework',$usuario["usuario"],time()+(60*60*24*5));
        }

         
    }

}