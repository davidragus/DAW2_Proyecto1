<?php

namespace App\Models;

use DBConnection;

abstract class AddressDAO
{

	public static function getAddressesByUserId($userId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM addresses WHERE user_id = ?");
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$addresses = [];
		while ($rows = $result->fetch_object("App\\Models\\Address")) {
			$addresses[] = $rows;
		}
		return $addresses;
	}

}
