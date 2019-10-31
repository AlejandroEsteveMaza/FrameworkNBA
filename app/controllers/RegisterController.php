<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\UserModel;
use core\form\Input;
use core\auth\Auth;

/**
 * Clase para el registro de nuevos usuarios
 */
class RegisterController extends Controller {
    /**
     * Página donde será redirigido si el registro es correcto
     *
     * @var string
     */
    private $redirect_to = '/';

    /**
     * Registra un nuevo usuario
     *
     * @return boolean
     */
    public function RegisterAction() {
        //Input::str();
        
        if (isset($_POST['submit'])) {
            $user = Input::str($_POST['user']);
            $password = Auth::crypt(Input::str($_POST['password']));
            $password2 = Auth::crypt(Input::str($_POST['password2']));
            
        }
        $campos = ["user","password","password2"];
        $camposPOST = array_keys($_POST);
        if (Input::check($campos, $camposPOST)) {
            $this->createUser($user, $password);
        }else{
            $this->renderView('registro');
        }
    }

    /**
     * guarda los datos en la tabla usuario y devuelve el id 
     *
     * @param [type] $userName
     * @param [type] $password
     * @return int
     */
    private function createUser($userName, $password) {
    }

    /**
     * Sube una imagen a la carpeta /public/images/avatares
     *
     * @param string $fileName
     * @param string $tmpFileName
     * @return boolean
     */
    private function uploadAvatar($fileName, $tmpFileName, $idUser) {
    }

}