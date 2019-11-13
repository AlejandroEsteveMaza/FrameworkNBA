<?php

use app\models\JugadorModel as JugadorModel;

$jugador = JugadorModel::find(614);

if (isset($jugador)) {
    foreach ($data as $key => $value) {
        $jugador->$key = $value;
    }
    $jugador->save();
    header("Location:" . $GLOBALS["config"]["site"]["root"] . "/jugadores");
} else {
    header("Location:" . $GLOBALS["config"]["site"]["root"] . "/error");
}