<?php

namespace App\Models;

use DBConnection;

abstract class OrderDAO
{

	public static function insertOrder($products)
	{
		$conn = DBConnection::connect();
		$query = "INSERT INTO orders(user_id) VALUES (?)";
		$stmt = $conn->prepare($query);
		$userId = $_SESSION[USER_SESSION_VAR];
		$stmt->bind_param("i", $userId);
		$stmt->execute();

		$products = ProductDAO::getProductsByIds(array_keys($_SESSION[CART_SESSION_VAR]));
		$unitPrice = [];
		foreach ($products as $product) {
			$unitPrice[$product->getId()] = $product->getPrice();
		}

		$orderLines = [];
		$counter = 1;
		foreach ($_SESSION[CART_SESSION_VAR] as $product_id => $quantity) {
			$orderLines[] = [
				'order_id' => $stmt->insert_id,
				'line_id' => $counter,
				'product_id' => $product_id,
				'quantity' => $quantity,
				'unit_price' => $unitPrice[$product_id]
			];
			$counter++;
		}

		OrderLineDAO::insertOrderLines($orderLines);
	}

}