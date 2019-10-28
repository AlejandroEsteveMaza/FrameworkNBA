<?php
use core\MVC\Kernel;

//Obtenemos el directorio Raiz
$directorioRaiz = dirname(dirname(__FILE__));
//Aplicamos la constante DIRECTORY_SEPARATOR
DEFINE("ds", DIRECTORY_SEPARATOR);


$config = require_once $directorioRaiz . ds . 'config.php';
require_once $directorioRaiz . ds . 'core' . ds . 'AutoLoad.php';

$kernel = new Kernel();

$kernel->run();

