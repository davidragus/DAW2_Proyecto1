<?php

class DBConnection
{

	public static function connect()
	{
		$connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if (!$connection) {
			die("Error: $connection->connect_error");
		}
		$connection->query("SET NAMES 'utf8'");
		return $connection;
	}

}
