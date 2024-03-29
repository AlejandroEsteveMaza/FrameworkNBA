<?php

namespace core\MVC;

class Router
{

	protected $params = array();
	protected $routers = array();
	protected $errorPage;

	protected function addRoutesFromFile(array $routers)
	{
		$this->errorPage = $routers["Error"];
		foreach ($routers["routes"] as $currentRoute) {
			array_push($this->routers, $currentRoute);
		}
	}

	protected function parseUriRouter()
	{
		global $config;
		$page = $this->errorPage;


		$uri = trim($_SERVER["REQUEST_URI"], "/");


		foreach ($this->routers as $currentRoute) {
			$route = $config["site"]["subdomain"]  . rtrim($currentRoute["route"], "/");
			
			$routerPattern = "#^" . preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route)) . "$#D";

			$matchesParams = array();
			if (preg_match_all($routerPattern, $uri, $matchesParams)) {

				$keys = array();
				


				array_shift($matchesParams);


				preg_match_all('/\\:([a-zA-Z0-9\_\-]+)/', $route, $keys);

				array_shift($keys);

				for ($i = 0; $i < count($keys[0]); $i++) {
					$this->params[$keys[0][$i]] = $matchesParams[$i][0];
				}
				$page = $currentRoute;
				
			}
		}


		return $page;
	}
}
