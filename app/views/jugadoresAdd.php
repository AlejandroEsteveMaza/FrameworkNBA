<?php
use app\models\JugadorModel as JugadorModel;

$jugador = new JugadorModel();
foreach ($data as $key => $value) {
    $jugador->$key = $value;
}
$jugador->save();

header("Location:".$GLOBALS["config"]["site"]["root"]."/jugadores");