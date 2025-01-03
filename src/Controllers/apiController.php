<?php

namespace App\Controllers;

use Exception;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Models\UserDAO, App\Models\ProductDAO, App\Models\CategoryDAO, App\Models\OrderDAO, App\Models\AddressDAO;

class apiController
{

	public function __construct()
	{
		session_start();
	}

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

	public function resetUserPassword()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		try {
			UserDAO::resetUserPassword($data);
			echo json_encode([
				'status' => 'success',
				'data' => 'Password resetted to "Tavernkeeper1"'
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
	}

	public function deleteUser()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if ($data == $_SESSION[USER_SESSION_VAR]) {
			echo json_encode([
				'status' => 'error',
				'data' => "You can't delete your own user."
			]);
			exit;
		}
		try {
			UserDAO::deleteUserById($data);
			echo json_encode([
				'status' => 'success',
				'data' => 'User deleted successfully'
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
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

	public function getAddressesByUserId()
	{
		if (isset($_GET['id'])) {
			$addresses = AddressDAO::getAddressesArrayByUserId($_GET['id']);

			if ($addresses) {
				echo json_encode([
					'status' => 'success',
					'data' => $addresses
				]);
				exit;
			}
		}

		http_response_code(404);
		echo json_encode([
			'status' => 'error',
			'data' => 'No addresses found'
		]);
	}

}