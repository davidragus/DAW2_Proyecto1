<?php

namespace App\Models;

use DBConnection;

abstract class ProductDAO
{

	public static function getProducts($categoryId = null)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products");
		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object('App\\Models\\RaidPreparation')) {
			$products[] = $rows;
		}
		return $products;
	}

}