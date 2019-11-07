<?php

namespace core\MVC;

class View
{

    private $view_name;
    private $data;

    public function __construct($nombreVista)
    {
        $this->view_name = $nombreVista;
    }

    public function render($data)
    {
        /* echo "<pre>";
        var_dump($data); */
        global $directorioRaiz;
        include_once($directorioRaiz . ds . "app" . ds . "views" . ds . $this->view_name . ".php");
    }
}
