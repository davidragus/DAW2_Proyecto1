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

		$stmt->close();
		$conn->close();
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

		$stmt->close();
		$conn->close();
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

		$stmt->close();
		$conn->close();
		return $product;
	}

	public static function getProductsInOffer($offerId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products WHERE product_id IN (SELECT product_id FROM offers_products WHERE offer_id = ?)");
		$stmt->bind_param("i", $offerId);
		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object("App\\Models\\Product")) {
			$products[] = $rows;
		}

		$stmt->close();
		$conn->close();
		return $products;
	}

	public static function getProductsArray()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products");
		$stmt->execute();
		$result = $stmt->get_result();
		$products = [];
		while ($rows = $result->fetch_object("App\\Models\\Product")) {
			$products[] = $rows->toArray();
		}

		$stmt->close();
		$conn->close();
		return $products;
	}

	public static function getProductArrayById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$product = $result->fetch_object("App\\Models\\Product");

		$stmt->close();
		$conn->close();
		return $product->toArray();
	}

	public static function deleteProductById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
		$productId = intval($id);
		$stmt->bind_param("i", $productId);
		OrderLineDAO::deleteOrderLinesByProductId($id);
		OfferProductDAO::deleteProductFromOffer($id);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function insertNewProduct($data)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT INTO products(category_id, subcategory_id, name, description, price, image, adults_only) VALUES(?, ?, ?, ?, ?, ?, ?)");
		$params = array_values($data);
		$stmt->bind_param("iissdsi", ...$params);
		$stmt->execute();
		$insertId = $stmt->insert_id;

		$stmt->close();
		$conn->close();
		return $insertId;
	}

	public static function updateProduct($data)
	{
		$conn = DBConnection::connect();
		if (isset($data['image'])) {
			$stmt = $conn->prepare("UPDATE products SET category_id = ?, subcategory_id = ?, name = ?, description = ?, price = ?, image = ?, adults_only = ? WHERE product_id = ?");
		} else {
			$stmt = $conn->prepare("UPDATE products SET category_id = ?, subcategory_id = ?, name = ?, description = ?, price = ?, adults_only = ? WHERE product_id = ?");
		}
		$params = array_values($data);
		if (isset($data['image'])) {
			$stmt->bind_param("iissdsii", ...$params);
		} else {
			$stmt->bind_param("iissdii", ...$params);
		}
		$stmt->execute();

		$stmt->close();
		$conn->close();
		return $params[count($params) - 1];
	}

}