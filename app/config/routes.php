<?php
	
	//notre table de correspondance entre les urls et les fonctions
	//de contrôleur à appeler
	
	//la clef (à gauche) est l'URL qui sera comparée avec l'URL de la requête.
	//si l'URL correspond, la méthode de contrôleur (la valeur, à droite), sera appelée par le Dispatcher

	//les routes peuvent ressemble à ce que vous voulez, mais commencent toutes par / : 
	/*
		"/articles/" 		=> "showPost",
		"/articles/detail/" => "showPostDetail",
		"/admin/"			=> "adminHome",
		"/admin/users/add/" => "addUser",
	*/

	$routes = [
		"/" => "home",
	];