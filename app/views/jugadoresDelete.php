<?php

use app\models\JugadorModel;

$jugador = JugadorModel::find(614);

if (isset($jugador)) {
    $jugador->delete();
    header("Location:" . $GLOBALS["config"]["site"]["root"] . "/jugadores");
} else {
    header("Location:" . $GLOBALS["config"]["site"]["root"] . "/error");
}
