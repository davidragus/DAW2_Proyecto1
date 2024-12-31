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

	public static function getProductsByIds($ids)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM products";
		$query .= " WHERE product_id IN (" . implode(", ", $ids) . ")";
		$stmt = $conn->prepare($query);
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
		$stmt = $conn->prepare("SELECT * FROM products");
		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object("App\\Models\\Product")) {
			$products[] = $rows->toArray();
		}
		return $products;
	}

}