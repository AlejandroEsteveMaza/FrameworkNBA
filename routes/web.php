<?php

return array(
    "routes" => array(
        "Inicio" => array(
            "route"=> "/",
            "controller" => "index",
            "action" => "index"
        ),
        
        "Equipos" => array(
            "route"=> "/equipo",
            "controller" => "index",
            "action" => "equipo"
        ),
        "Jugadores" => array(
            "route"=> "/jugadores",
            "controller" => "index",
            "action" => "jugadores"
        ),

        "InsertarJugadores" => array(
            "route"=> "/jugadores/nuevo",
            "controller" => "index",
            "action" => "insertarJugador"
        ),
        "ActualizarJugadores" => array(
            "route"=> "/jugadores/actualizar",
            "controller" => "index",
            "action" => "actualizarJugador"
        ),
        "BorrarJugadores" => array(
            "route"=> "/jugadores/borrar",
            "controller" => "index",
            "action" => "borrarJugador"
        ),
        
        "Jugador" => array(
            "route"=> "/jugador/:idJugador",
            "controller" => "jugador",
            "action" => "datosJugador"
        ),
    ),
    "Error" => array(
        
        "controller" => "error",
        "action" => "error"
    ),
);