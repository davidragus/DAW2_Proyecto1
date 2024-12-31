<?php

namespace App\Controllers;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Models\UserDAO, App\Models\ProductDAO, App\Models\CategoryDAO;

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

		$filters = [];
		// if (isset($_GET['name']))
		// 	$filters['name'] = "%" . $_GET['name'] . "%";
		// if (isset($_GET['category']))
		// 	$filters['category_id'] = $_GET['category'];
		// if (isset($_GET['subcategory']))
		// 	$filters['subcategory_id'] = $_GET['subcategory'];

		$products = ProductDAO::getProductsArray($filters);

		echo json_encode([
			'status' => 'success',
			'data' => $products
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