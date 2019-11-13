<?php

namespace app\controllers;

use core\MVC\Controller as Controller;

use app\models\JugadorModel;
use core\auth\Auth;

class ApiController extends Controller
{
    public function getJugadoresAction()
    {
        $movies = JugadorModel::getAllToAPI();
        echo json_encode($movies);
    }
    public function loginAction()
    {
        $this->renderView('login');
    }
    
    public function validateAction()
    {
        echo "PICHITAS";
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            var_dump($_POST);
        }else{
            header('HTTP/1.0 403 Forbidden');
        }
        /* 
        $user = $_POST['user'];
       
        $campos = ["user", "password"];
        $camposPOST = array_keys($_POST);
        $usuario = UserModel::where('usuario', '=', $user)->get();

        if (Input::check($campos, $camposPOST) && count($usuario) != 0) {

            $usuario = $usuario[0];

            if (Auth::passwordVerify($_POST['password'], $usuario["password"])) {

                $this->setSession($usuario);
               
                
            } else {
                $this->renderView('login');
            }
        } else {
            $this->renderView('login');
        } */
    }
    private function setSession($usuario)
    {
        $jwt = Auth::createToken($usuario);
        setcookie('DWS_framework', $jwt, time() + (60 * 60 * 24 * 5));
    }
}
