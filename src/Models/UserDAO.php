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

		$stmt->close();
		$conn->close();
		return $user;
	}

	public static function getUserById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_object("App\\Models\\User");

		$stmt->close();
		$conn->close();
		return $user;
	}

	public static function createUser($email, $password, $firstName, $lastName)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT INTO users(email, password, first_name, last_name) VALUES(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $email, $password, $firstName, $lastName);
		$stmt->execute();
		$insertId = $stmt->insert_id;

		$stmt->close();
		$conn->close();
		return $insertId;
	}

	public static function insertNewUser($data)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT INTO users(password, role, email, first_name, last_name) VALUES(?, ?, ?, ?, ?)");
		$params = [
			DEFAULT_PASS
		];
		array_push($params, ...array_values($data));
		$stmt->bind_param("sssss", ...$params);
		$stmt->execute();
		$insertId = $stmt->insert_id;

		$stmt->close();
		$conn->close();
		return $insertId;
	}

	public static function updateUser($data)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE users SET role = ?, email = ?, first_name = ?, last_name = ? WHERE user_id = ?");
		$params = array_values($data);
		$stmt->bind_param("ssssi", ...$params);
		$stmt->execute();

		$stmt->close();
		$conn->close();
		return $params[count($params) - 1];
	}

	public static function updateUserInfo($id, $firstName, $lastName, $email)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ? WHERE user_id = ?");
		$stmt->bind_param("sssi", $firstName, $lastName, $email, $id);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function updateUserPassword($id, $password)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
		$stmt->bind_param("si", $password, $id);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function getUsersArray()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM users");
		$stmt->execute();
		$result = $stmt->get_result();
		$users = [];
		while ($rows = $result->fetch_object("App\\Models\\User")) {
			$users[] = $rows->toArray();
		}

		$stmt->close();
		$conn->close();
		return $users;
	}

	public static function getAdminsArray()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM users WHERE role = 'ADMIN'");
		$stmt->execute();
		$result = $stmt->get_result();
		$users = [];
		while ($rows = $result->fetch_object("App\\Models\\User")) {
			$users[] = $rows->toArray();
		}

		$stmt->close();
		$conn->close();
		return $users;
	}

	public static function getUserArrayById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_object("App\\Models\\User");

		$stmt->close();
		$conn->close();
		return isset($user) ? $user->toArray() : null;
	}

	public static function resetUserPassword($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE users SET password = ? WHERE user_id = ?");
		$defaultPass = DEFAULT_PASS;
		$userId = intval($id);
		$stmt->bind_param("si", $defaultPass, $userId);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function deleteUserById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
		$userId = intval($id);
		$stmt->bind_param("i", $userId);
		OrderDAO::deleteOrdersByUserId($id);
		AddressDAO::deleteAddressByUserId($id);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

}