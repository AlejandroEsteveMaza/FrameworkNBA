<?php

namespace core\MVC;

use core\MVC\View;

abstract class Controller
{

    public function run($action, $params = null)
    {
        $this->$action($params);
    }

    public function renderView($viewName, $data = null)
    {
        $vista = new View($viewName);
        $vista -> render($data);
    }
}
