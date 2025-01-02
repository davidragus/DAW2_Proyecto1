<?php

namespace App\Controllers;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Models\UserDAO, App\Models\ProductDAO, App\Models\CategoryDAO, App\Models\OrderDAO;

class apiController
{

	public function getUsers()
	{
		$users = UserDAO::getUsersArray();

		echo json_encode([
			'status' => 'success',
			'data' => $users
		]);
	}

	public function getUserById()
	{
		if (isset($_GET['id'])) {
			$user = UserDAO::getUserArrayById($_GET['id']);

			if ($user) {
				echo json_encode([
					'status' => 'success',
					'data' => $user
				]);
				exit;
			}
		}

		http_response_code(404);
		echo json_encode([
			'status' => 'error',
			'data' => 'No user found'
		]);
	}

	public function getProducts()
	{
		$products = ProductDAO::getProductsArray();

		echo json_encode([
			'status' => 'success',
			'data' => $products
		]);
	}

	public function getProductById()
	{
		if (isset($_GET['id'])) {
			$product = ProductDAO::getProductArrayById($_GET['id']);

			if ($product) {
				echo json_encode([
					'status' => 'success',
					'data' => $product
				]);
				exit;
			}
		}

		http_response_code(404);
		echo json_encode([
			'status' => 'error',
			'data' => 'No product found'
		]);
	}

	public function getOrders()
	{
		$orders = OrderDAO::getOrdersArray();

		echo json_encode([
			'status' => 'success',
			'data' => $orders
		]);
	}

	public function getCategories()
	{
		$categories = CategoryDAO::getCategoriesArray();

		echo json_encode([
			'status' => 'success',
			'data' => $categories
		]);
	}

}