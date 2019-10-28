<?php
namespace app\controllers;

use core\MVC\Controller as Controller;

class ErrorController extends Controller {
    public function ErrorAction(){
        $this->renderView('error');
    }
}