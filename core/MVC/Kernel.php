<?php

namespace core\MVC;

class Kernel extends Router
{

	private $controllerName;
	private $actionName;

	public function setControllerName($controllerName)
	{
		$this->controllerName = ucfirst(strtolower($controllerName)) . 'Controller';
	}

	public function setAtionName($actionName)
	{
		$this->actionName = ucfirst(strtolower($actionName)) . 'Action';
	}

	public function __construct()
	{
		global $directorioRaiz;
		$routes = require_once $directorioRaiz . ds . 'routes' . ds . 'web.php';
		$this->addRoutesFromFile($routes);
	}

	public function run()
	{
		$ruta  = $this->parseUriRouter();
		if ($ruta != null) {
			$this->setControllerName($ruta["controller"]);
			$this->setAtionName($ruta["action"]);
		}

		$controllerName = 'app\controllers\\' . $this->controllerName;
		$controller = new $controllerName();
		$controller->run($this->actionName, $this->params);
	}
}
