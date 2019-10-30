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

        "Registro" => array(
			"route" => "/registro",
			"controller" => "index",
			"action" => "registro"
		),

		"RegistroUsuario" => array(
			"route" => "/registroUsuario",
			"controller" => "register",
			"action" => "register"
		),

		"login" => array(
			"route" => "/login",
			"controller" => "index",
			"action" => "login"
		),

		"compruebaLogin" => array(
			"route" => "/compruebaLogin",
			"controller" => "login",
			"action" => "validate"
		),

		"logout" => array(
			"route" => "/logout",
			"controller" => "login",
			"action" => "logout"
        ),
    ),
    "Error" => array(
        
        "controller" => "error",
        "action" => "error"
    ),
);