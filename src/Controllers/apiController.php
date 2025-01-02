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

	public function getProducts()
	{
		$products = ProductDAO::getProductsArray();

		echo json_encode([
			'status' => 'success',
			'data' => $products
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