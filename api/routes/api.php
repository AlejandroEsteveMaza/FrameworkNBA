<?php
//$dir = $GLOBALS["config"]["site"]["api"];
return array(
    "get" => array(
        "Jugadores" => array(
            "route"=> "/getjugadores",
            "controller" => "api",
            "action" => "getJugadores"
        ),
        "Login" => array(
            "route"=> "/login",
            "controller" => "api",
            "action" => "login"
        ),
       
    ),
    "post" => array(
        "Usuario" => array(
            "route"=> "/validateuser",
            "controller" => "api",
            "action" => "validate"
        ),
       
    ),
   
);