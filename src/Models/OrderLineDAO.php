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

		$stmt->close();
		$conn->close();
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

		$stmt->close();
		$conn->close();
	}

	public static function getOrderLinesArrayByOrderId($orderId)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM orderlines WHERE order_id = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $orderId);
		$stmt->execute();
		$result = $stmt->get_result();
		$orderLines = [];
		while ($rows = $result->fetch_object("App\\Models\\OrderLine")) {
			$orderLines[] = $rows->toArray();
		}

		$stmt->close();
		$conn->close();
		return $orderLines;
	}

	public static function deleteOrderLinesByOrderId($orderId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("DELETE FROM orderlines WHERE order_id = ?");
		$stmt->bind_param("i", $orderId);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function deleteOrderLinesByProductId($productId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("DELETE FROM orderlines WHERE product_id = ?");
		$stmt->bind_param("i", $productId);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}
}