<?php

namespace App\Models;

use DBConnection;

abstract class UserDAO
{

	public static function getUserByMail($emailAddress)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
		$stmt->bind_param("s", $emailAddress);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = [];
		while ($rows = $result->fetch_object("App\\Models\\User")) {
			$user = $rows;
		}
		return $user;
	}

	public static function createUser($email, $password, $firstName, $lastName)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT INTO users(email, password, first_name, last_name) VALUES(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $email, $password, $firstName, $lastName);
		$stmt->execute();
	}

}