<?php

namespace App\Models;

use DBConnection;

abstract class ProductDAO
{
	// TODO: Agregar gestión de errores
	public static function getProductsByCategory($category)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
		$categoryId = $category->getCategoryId();
		$stmt->bind_param("i", $categoryId);
		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object("App\\Models\\Product")) {
			$products[] = $rows;
		}
		return $products;
	}

	public static function getProductById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$product = $result->fetch_object("App\\Models\\Product");
		return $product;
	}

	public static function getProductsArray($filters)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM products";
		if (!empty($filters)) {
			$whereStatements = [];
			foreach ($filters as $key => $value) {
				$whereStatements[] = "$key LIKE ?";
			}
			$query .= " WHERE " . implode(" AND ", $whereStatements);
		}

		$stmt = $conn->prepare($query);
		$bindings = [];
		if (!empty($filters)) {
			foreach ($filters as $value) {
				$bindings[] = $value;
			}
			$types = str_repeat('s', count($bindings));
			$stmt->bind_param($types, ...$bindings);
		}

		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object("App\\Models\\Product")) {
			$products[] = $rows->toArray();
		}
		return $products;
	}

}