<?php

namespace App\Models;

use DBConnection;

abstract class OrderLineDAO
{

	public static function insertOrderLines($data)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT INTO orderlines(order_id, line_id, product_id, quantity, unit_price) VALUES (?, ?, ?, ?, ?)");
		foreach ($data as $line) {
			$values = array_values($line);
			$stmt->bind_param('iiiid', ...$values);
			$stmt->execute();
		}
	}

}