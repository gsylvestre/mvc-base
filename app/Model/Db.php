<?php

namespace Model;

use \PDO;
use \PDOException;

//design pattern du singleton
class Db
{
	//database handle
	private static $dbh;

	public static function getDbh()
	{
		//si on n'est pas encore connecté...
		if (!self::$dbh){
			//on se connecte et on donne une valeur à $dbh
			self::connect();
		}

		//on retourne la "connexion"
		return self::$dbh;
	}

	//connexion à la base. Est appelée indirectement par getDbh
	private static function connect()
	{

		try {
	        //connexion à la base avec la classe PDO et le dsn
			self::$dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, [
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //on s'assure de communiquer en utf8
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //on récupère nos données en array associatif par défaut
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING         //on affiche les erreurs. À modifier en prod. 
			]);
		} catch (PDOException $e) { //attrappe les éventuelles erreurs de connexion
		    echo 'Erreur de connexion : ' . $e->getMessage();
		}
	}
}