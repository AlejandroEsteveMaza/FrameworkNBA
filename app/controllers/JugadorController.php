<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel as JugadorModel;
use app\models\UserModel;
use app\models\CommentsModel;
class JugadorController extends Controller {
    public function JugadorAction(){
        $this->renderView('jugador');
    }
    public function DatosJugadorAction($params){
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::where('codigo','=',$idJugador)->get();

        $comentarios = CommentsModel::where('jugador','=', $idJugador)->get();

        $data = array($jugador[0],$comentarios);
        $this->renderView('jugador',$data);
    }
    public function CommentAction() {
        //echo $_SESSION['userName']."<br>";
        $usuario = UserModel::where('usuario','=',$_SESSION['userName'])->get();
       // var_dump($usuario);
        $data = array("jugador" =>  $_POST['idJugador'], "usuario" => $usuario[0]["codigo"], "comentario" => $_POST['comentario']);

        $comentario = new CommentsModel();
        foreach ($data as $key => $value) {
            $comentario->$key = $value;
        }
        $comentario->save();

        $data = array("idJugador" =>  $_POST['idJugador']);
        $this->DatosJugadorAction($data);
        header("Location:" . $GLOBALS["config"]["site"]["root"] . "/jugador".ds . $_POST['idJugador']);
    }
   
}