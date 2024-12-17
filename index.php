<?php

require_once('vendor/autoload.php');

$controllerName = isset($_GET['controller']) ? $_GET['controller'] : null;
$actionName = isset($_GET['action']) ? $_GET['action'] : null;

if (isset($controllerName)) {
	$controllerClass = "App\\Controllers\\{$controllerName}Controller";
	if (class_exists($controllerClass)) {
		$controller = new $controllerClass();
		if (isset($_GET['action']) && method_exists($controller, $actionName)) {
			$action = $actionName;
		} else { //TODO: Retocar a donde se redirige
			$action = DEFAULT_ACTION;
		}
		$controller->$action();
	} else {
		$controllerClass = DEFAULT_CONTROLLER;
		$controller = new $controllerClass();
		$action = DEFAULT_ACTION;
		$controller->$action();
	}
} else {
	$controllerClass = DEFAULT_CONTROLLER;
	$controller = new $controllerClass();
	$action = DEFAULT_ACTION;
	$controller->$action();
}