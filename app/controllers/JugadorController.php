<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\model\JugadorModel as JugadorModel;

class JugadorController extends Controller {
    public function JugadorAction(){
        $this->renderView('jugador');
    }
    public function DatosJugadorAction($params){
        $idJugador = $params['idJugador'];
        $jugador = JugadorModel::where('codigo','=',$idJugador)->get();
        $this->renderView('jugador',$jugador);
    }
   
}