<?php

namespace App\Models;

use DBConnection;

abstract class OrderDAO
{

	public static function getOrdersByUserId($userId)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM orders WHERE user_id = ? ORDER BY date DESC";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$orders = [];
		while ($rows = $result->fetch_object("App\\Models\\Order")) {
			$rows->setOrderLines(OrderLineDAO::getOrderLinesByOrderId($rows->getOrderId()));
			$orders[] = $rows;
		}

		$stmt->close();
		$conn->close();
		return $orders;
	}

	public static function getOrderById($orderId)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM orders WHERE order_id = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $orderId);
		$stmt->execute();
		$result = $stmt->get_result();
		$order = $result->fetch_object("App\\Models\\Order");
		$order->setOrderLines(OrderLineDAO::getOrderLinesByOrderId($orderId));

		$stmt->close();
		$conn->close();
		return $order;
	}

	public static function getOrderArrayById($orderId)
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM orders WHERE order_id = ?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $orderId);
		$stmt->execute();
		$result = $stmt->get_result();
		$order = $result->fetch_object("App\\Models\\Order");
		$order->setOrderLines(OrderLineDAO::getOrderLinesArrayByOrderId($orderId));

		$stmt->close();
		$conn->close();
		return $order->toArray();
	}

	public static function insertOrder($productsData, $userId, $addressId)
	{
		$conn = DBConnection::connect();
		$query = "INSERT INTO orders(user_id, address_id) VALUES (?, ?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("ii", $userId, $addressId);
		$stmt->execute();

		$products = ProductDAO::getProductsByIds(array_keys($productsData));
		$offers = OfferDAO::getActiveOffers();
		$unitPriceInOffer = [];
		foreach ($offers as $offer) {
			foreach ($offer->getProducts() as $product) {
				$unitPriceInOffer[$product->getId()] = $offer->getIsPercentage() ? $product->getPrice() - $product->getPrice() * ($offer->getOfferValue() / 100) : $product->getPrice() - $offer->getOfferValue();
			}
		}

		$unitPrice = [];
		foreach ($products as $product) {
			$unitPrice[$product->getId()] = array_key_exists($product->getId(), $unitPriceInOffer) ? $unitPriceInOffer[$product->getId()] : $product->getPrice();
		}

		$orderLines = [];
		$counter = 1;
		foreach ($productsData as $product_id => $quantity) {
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
		$stmt->close();
		$conn->close();
	}

	public static function getOrdersArray()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM orders");
		$stmt->execute();
		$result = $stmt->get_result();
		$orders = [];
		while ($rows = $result->fetch_object("App\\Models\\Order")) {
			$rows->setOrderLines(OrderLineDAO::getOrderLinesArrayByOrderId($rows->getOrderId()));
			$orders[] = $rows->toArray();
		}

		$stmt->close();
		$conn->close();
		return $orders;
	}

	public static function deleteOrdersByUserId($userId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM orders WHERE user_id = ?");
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($rows = $result->fetch_object("App\\Models\\Order")) {
			OrderLineDAO::deleteOrderLinesByOrderId($rows->getOrderId());
		}
		$stmt->close();

		$stmt = $conn->prepare("DELETE FROM orders WHERE user_id = ?");
		$stmt->bind_param("i", $userId);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function deleteOrderById($orderId)
	{
		$conn = DBConnection::connect();
		OrderLineDAO::deleteOrderLinesByOrderId($orderId);
		$stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
		$stmt->bind_param("i", $orderId);
		$stmt->execute();

		$stmt->close();
		$conn->close();
	}

	public static function updateOrderStatus($data)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE orders SET status = ? WHERE order_id = ?");
		$params = array_values($data);
		$stmt->bind_param("si", ...$params);
		$stmt->execute();

		$stmt->close();
		$conn->close();
		return $params[count($params) - 1];
	}
}