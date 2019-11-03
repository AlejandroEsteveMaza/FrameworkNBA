<?php
namespace app\controllers;

use core\MVC\Controller as Controller;
use app\models\JugadorModel as JugadorModel;

class IndexController extends Controller {
    public function IndexAction(){
        $this->renderView('inicio');
    }
    public function EquipoAction(){
        $this->renderView('equipo');
    }
    public function JugadoresAction(){
        $jugadores = JugadorModel::where('Nombre_equipo','=','Celtics')->get();
        $this->renderView('jugadores', $jugadores);
    }
    public function InsertarJugadorAction(){
        $record = array("codigo" => 614, "Nombre" => "Josito Johnson", "Nombre_equipo" =>"Celtics", "Peso" => 231);
        $this->renderView('jugadoresAdd', $record);
    }
    public function ActualizarJugadorAction(){
        $record = array("Nombre" => "Josito AAAAAA", "Peso" => 60970);
        $this->renderView('jugadoresUpdate', $record);
    }
    public function BorrarJugadorAction(){
       $this->renderView('jugadoresDelete');
    }
    public function RegistroAction() {
        $this->renderView('registro');
    }
    public function LoginAction() {
        $this->renderView('login');
    }
}