<?php

namespace app\controllers;

use core\MVC\Controller as Controller;

use app\models\JugadorModel;

class ApiController extends Controller
{
    public function getJugadoresAction()
    {
        $movies = JugadorModel::getAllToAPI();
        //var_dump($movies);
        echo json_encode($movies);
    }
}
