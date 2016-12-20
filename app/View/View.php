<?php

//on est dans le dossier /View
namespace View;

class View
{
	//statique juste pour qu'on puisse l'appeler en une seule ligne :)
	//reçoit le nom de la page à inclure (avec ou sans extension) et le title de la page
	//pour rendre des variables disponibles dans la vue, on utilise le 
	//3e argument
	public static function show($page, $title, array $vars = null)
	{
		//si on a des données supplémentaires...
		if (!empty($vars)){
			//on extrait les données
			//les CLEFS du tableau servent ici de NOM AUX VARIABLES CRÉÉES
			extract($vars);
		}

		//permet de passer la page avec ou sans .php
		$page = str_replace(".php", "", $page);

		//base se chargera d'inclure $page
		//et d'afficher le title dans le head
		include("app/templates/base.php");
	}

}