<?php
	//ceci est le contrôleur frontal
	//il doit être short & sweet

	//charge nos définitions de routes
	require("app/config/routes.php");

	//configuration de l'appli
	require("app/config/config.php");

	//charge toutes nos dépendances composer
	if (file_exists("vendor/autoload.php")){
		require("vendor/autoload.php");
	}

	//auto chargement de nos classes
	spl_autoload_register(function($className){
		$path = "app" . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";
		if (file_exists($path)){
			require($path);
		}
	});

	//le dispatcher trouve la correspondance entre nos routes et l'url
	$p = (empty($_GET['p'])) ? "/" : $_GET['p'];
	$dispatcher = new Controller\Dispatcher();
	$dispatcher->dispatch($routes, $p);