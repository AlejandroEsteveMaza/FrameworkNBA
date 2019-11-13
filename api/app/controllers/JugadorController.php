<?php

namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel as JugadorModel;
use app\models\UserModel;
use app\models\CommentsModel;
use core\JWT\JWT;

class JugadorController extends Controller
{
    public function JugadorAction()
    {
        $this->renderView('jugador');
    }
    public function DatosJugadorAction($params)
    {
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::where('codigo', '=', $idJugador)->get();

        $comentarios = CommentsModel::where('jugador', '=', $idJugador)->get();
        
        $data = array($jugador[0], $comentarios);
        $this->renderView('jugador', $data);
    }
    public function CommentAction()
    {
        $key = $GLOBALS["config"]["JWT"]["key"];
        $decoded = JWT::decode($_COOKIE["DWS_framework"], $key, array('HS256'));
        $decoded_array = (array) $decoded;
        var_dump( $decoded);
      
        $usuario = UserModel::where('usuario', '=', $decoded_array['userName'] )->get();
        

        if (!isset($usuario) || count($usuario) == 0) {
            throw new \Exception('No estas logueado');
        }

        try {
            header("Location:" . $GLOBALS["config"]["site"]["root"] . ds . "jugador". ds . $_POST['idJugador']);
            $data = array("jugador" =>  $_POST['idJugador'], "usuario" => $usuario[0]["codigo"], "comentario" => $_POST['comentario']);

            $comentario = new CommentsModel();
            foreach ($data as $key => $value) {
                $comentario->$key = $value;
            }
            $comentario->save();

            $data = array("idJugador" =>  $_POST['idJugador']);
            
            $this->DatosJugadorAction($data);
           
        } catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
         
    }
}
