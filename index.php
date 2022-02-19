<?php 

session_start();

require_once('Config/database.php');

if (isset($_GET['controller'])) {
	# code...
	$controller = $_GET['controller'];
	if (isset($_GET['action'])) {
		# code...
		$action = $_GET['action'];
	} else {
		$action = 'getView';
	}
} else {
	$controller = 'Home';
	$action = 'getView';
}

$controllerName = $controller.'Controller';

require_once('Controller/'.$controllerName.'.php');

$controller = new $controllerName();

$controller->$action();

?>