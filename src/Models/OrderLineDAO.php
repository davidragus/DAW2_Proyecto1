<?php

namespace App\Models;

use DBConnection;

abstract class OrderLineDAO
{

	public static function getOrderLinesByOrderId($orderId)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM orderlines WHERE order_id = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $orderId);
		$stmt->execute();
		$result = $stmt->get_result();
		$orderLines = [];
		while ($rows = $result->fetch_object("App\\Models\\OrderLine")) {
			$orderLines[] = $rows;
		}
		return $orderLines;
	}

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