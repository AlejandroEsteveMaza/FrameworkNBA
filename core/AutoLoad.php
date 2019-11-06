<?php
class AutoLoad
{
    
    public function load($classNameSpace)
    {
        $dirname = dirname(dirname(__FILE__));
        $classPath = str_replace("\\", ds, $classNameSpace);
        $dir = $dirname.ds.$classPath.".php"; 

        /* $classNameSpace =  strtolower($classNameSpace);
        $directorio = $classNameSpace . ".php"; */

        if (file_exists($dir)) {
            require_once($dir);
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
