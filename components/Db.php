<?php
class Db
{
	public static function getConnection()
	{
		$paramsPath = ROOT . '/config/db_params.php';
		$params = include($paramsPath);

		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$db = new PDO($dsn, $params['user'], $params['password']);
		return $db;
	}
}
			// $host = 'phpstart';
			// $dbname = 'mvc_site';
			// $user = 'root';
			// $password = '';
			// $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
