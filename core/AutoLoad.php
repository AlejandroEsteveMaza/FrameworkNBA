<?php
class AutoLoad
{

    public function load($classNameSpace)
    {
        $classNameSpace =  strtolower($classNameSpace);
        $directorio = $classNameSpace . ".php";
        if (file_exists($directorio)) {
        
            require_once($directorio);
        } else {
            die("El archivo {$classNameSpace}.php no se ha podido encontrar.");
        }
    }

    public function registerAutoLoad()
    {
        spl_autoload_register(array($this, "load"), true, true);
    }
}

$autoLoad = new AutoLoad();
$autoLoad->registerAutoLoad();
