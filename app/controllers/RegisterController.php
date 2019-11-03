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
            $password = Input::str($_POST['password']);
            $password2 = Input::str($_POST['password2']);
            //var_dump($_FILES["avatar"]);
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
     * guarda los datos en la tabla usuario y devuelve el id 
     *
     * @param [type] $userName
     * @param [type] $password
     * @return int
     */
    private function createUser($userName, $password) {
        $user = new UserModel();
        $usr = $user::getUserNameField();
        $user->$usr = $userName;

        $passwd = $user::getPasswordField();
        $user->$passwd = $password;

        $user->save();
        //self->uploadAvatar();
        return $user->lastInsertId(); //DEVUELVE 0
       /*  if ($user->save()) {
            return $user->lastInsertId();
        }else{
            return -1;
        } */
    }

    /**
     * Sube una imagen a la carpeta /public/images/avatares
     *
     * @param string $fileName
     * @param string $tmpFileName
     * @return boolean
     */
    private function uploadAvatar($fileName, $tmpFileName, $idUser) {
        if (Input::checkImage($fileName)) {
            //inacabado
        }
    }

}