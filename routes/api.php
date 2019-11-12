<?php
$dir = $GLOBALS["config"]["site"]["api"];
return array(
    "get" => array(
        "Jugadores" => array(
            "route"=> $dir . "jugadores",
            "controller" => "api",
            "action" => "getJugadores"
        ),
        
       
    ),
   
);