<?php

class Router
{

	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

// Return type

	private function getURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run()
	{
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

			if(preg_match("~$uriPattern~", $uri)) {
				echo '<br> Где ищем (запрос, который набрал пользователь): ' .$uri;
				echo '<br> Что ищем (совпадения из правила): ' .$uriPattern;
				echo '<br> Кто обрабатывает: ' .$path;

				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				echo '<br><br>Нужно сформировать: '.$internalRoute;
				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);


				$actionName = 'action'.ucfirst((array_shift($segments)));
				echo '<br>Класс: '.$controllerName;
				echo '<br>Метод: '.$actionName;
				$parameters = $segments;
				echo '<pre>';
				print_r($parameters);




				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';
				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				}

				$controllerObject = new $controllerName;
				//$result = $controllerObject->$actionName($parameters);

				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				if ($result != null) {
					break;
				}
			}

		}
	}
}