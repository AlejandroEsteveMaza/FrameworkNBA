<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel as JugadorModel;

class JugadorController extends Controller {
    public function JugadorAction(){
        $this->renderView('jugador');
    }
    public function DatosJugadorAction($params){
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::where('codigo','=',$idJugador)->get();
        $this->renderView('jugador',$jugador);
    }
    public function CommentAction() {
       /*  $record = array("codigo" => 614, "Nombre" => "Josito Johnson", "Nombre_equipo" =>"Celtics", "Peso" => 231);
        $this->renderView('jugadoresAdd', $record); */
    }
   
}