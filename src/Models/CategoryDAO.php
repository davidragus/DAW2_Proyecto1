<?php

namespace App\Models;

use DBConnection;

abstract class CategoryDAO
{

	public static function getCategories()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM categories WHERE subcategory IS NULL");
		$stmt->execute();
		$result = $stmt->get_result();
		$categories = [];
		while ($rows = $result->fetch_object('App\\Models\\Category')) {
			$categories[] = $rows;
		}
		return $categories;
	}

}