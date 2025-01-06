<?php

namespace App\Models;

use DBConnection;

abstract class LogDAO
{

	public static function getLogsArray()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM logs ORDER BY timestamp DESC");
		$stmt->execute();
		$result = $stmt->get_result();
		$categories = [];
		while ($rows = $result->fetch_object('App\\Models\\Log')) {
			$categories[] = $rows->toArray();
		}

		$stmt->close();
		$conn->close();
		return $categories;
	}

	public static function insertLog($user_id, $type, $action, $id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT INTO logs(user_id, action, type, id) VALUES(?, ?, ?, ?)");
		$stmt->bind_param("issi", $user_id, $type, $action, $id);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

}