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

	public function insertUser()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		try {
			$user = UserDAO::getUserByMail($data['email']);
			if ($user) {
				echo json_encode([
					'status' => 'error',
					'data' => 'The email introduced is already registered.'
				]);
				exit;
			}

			$response = UserDAO::insertNewUser($data);
			echo json_encode([
				'status' => 'success',
				'data' => $response
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
	}

	public function updateUser()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		try {
			$user = UserDAO::getUserByMail($data['email']);
			if ($user && ($user->getUserId() != $_SESSION[USER_SESSION_VAR] && $user->getEmail() != $data['email'])) {
				echo json_encode([
					'status' => 'error',
					'data' => 'The email introduced is already registered.'
				]);
				exit;
			}

			$response = UserDAO::updateUser($data);
			echo json_encode([
				'status' => 'success',
				'data' => $response
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
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

	public function insertProduct()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		try {

			$response = ProductDAO::insertNewProduct($data);
			echo json_encode([
				'status' => 'success',
				'data' => $response
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
	}

	public function updateProduct()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		try {
			$response = ProductDAO::updateProduct($data);
			echo json_encode([
				'status' => 'success',
				'data' => $response
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
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

	public function deleteProduct()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		try {
			ProductDAO::deleteProductById($data);
			echo json_encode([
				'status' => 'success',
				'data' => 'Product deleted successfully'
			]);
		} catch (Exception $exception) {
			http_response_code(500);
			echo json_encode([
				'status' => 'error',
				'data' => 'An unexpected error occurred'
			]);
		}
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

	public function getCategory()
	{
		if (isset($_GET['id'])) {
			$category = CategoryDAO::getCategoryArray($_GET['id']);

			if ($category) {
				echo json_encode([
					'status' => 'success',
					'data' => $category
				]);
			} else {
				echo json_encode([
					'status' => 'error',
					'data' => 'The category does not exist'
				]);
			}
		}
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

	public function getAddressById()
	{
		if (isset($_GET['id'])) {
			$address = AddressDAO::getAddressArrayById($_GET['id']);

			if ($address) {
				echo json_encode([
					'status' => 'success',
					'data' => $address
				]);
				exit;
			}
		}

		http_response_code(404);
		echo json_encode([
			'status' => 'error',
			'data' => 'No address found'
		]);
	}

	public function uploadImage()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($_FILES["image"]["type"] == "image/webp") {
				if (move_uploaded_file($_FILES['image']['tmp_name'], BASE_PATH . 'assets/images/' . $_FILES['image']['name'])) {
					echo json_encode([
						'status' => 'success',
						'data' => 'Image uploaded successfully'
					]);
				} else {
					echo json_encode([
						'status' => 'error',
						'data' => 'Unexpected error when uploading the image'
					]);
				}
			}
		}
	}

	public function getOrderById()
	{
		if (isset($_GET['id'])) {
			$order = OrderDAO::getOrderArrayById($_GET['id']);

			if ($order) {
				echo json_encode([
					'status' => 'success',
					'data' => $order
				]);
				exit;
			}
		}

		http_response_code(404);
		echo json_encode([
			'status' => 'error',
			'data' => 'No order found'
		]);
	}

}