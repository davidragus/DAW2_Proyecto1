<?php

namespace App\Models;

use DBConnection;

abstract class ProductDAO
{

	public static function getProductsByCategory($category)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
		$categoryId = $category->getCategoryId();
		$stmt->bind_param("i", $categoryId);
		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object("App\\Models\\{$category->getProductModel($category->getCategoryId())}")) {
			$products[] = $rows;
		}
		return $products;
	}

}