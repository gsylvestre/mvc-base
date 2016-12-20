<?php

namespace Controller;

use Controller\DefaultController; //pas essentiel, on est dans le même namespace

class Dispatcher
{
	//reçoit la liste des routes, et le paramètre p en argument
	public function dispatch($routes, $p)
	{

		//crée une instance du contrôleur
		$controller = new DefaultController();

		//on trouve la route à appeler 
		//en fonction de ce qu'il y a dans l'URL
		foreach($routes as $url => $method){
			if ($url == $p){
				//appelle la méthode associée (définie dans routes.php)
				return call_user_func([$controller, $method]);
			}
		}

		//si on est arrivé ici... 404. La route n'a pas été trouvée.
		return call_user_func([$controller, "error404"]);
	}

}