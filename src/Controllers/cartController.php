<?php

namespace App\Controllers;

use App\Models\ProductDAO;

class cartController extends commonController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}

		if (checkSessionVar(CART_SESSION_VAR)) {
			$products = ProductDAO::getProductsByIds(array_keys($_SESSION[CART_SESSION_VAR]));
			$userCart = [];
			foreach ($products as $product) {
				$userCart[$product->getName()] = [
					'id' => $product->getId(),
					'image' => $product->getImage(),
					'quantity' => $_SESSION[CART_SESSION_VAR][$product->getId()],
					'price' => number_format($product->getPrice() * $_SESSION[CART_SESSION_VAR][$product->getId()], 2)
				];
			}

			$pageParams = [
				'pageTitle' => "Tiefling's Tavern",
				'pageHeader' => $this->pageHeader,
				'pageContent' => 'cart/index',
				'pageFooter' => $this->pageFooter,
				'variables' => [
					'userCart' => $userCart
				]
			];
			view('template', $pageParams);
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'cart/index',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];
		view('template', $pageParams);

	}

	public function addToCart()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}

		if (!isset($_POST['productQuantity']) || intval($_POST['productQuantity']) < 1) {
			$_POST['productQuantity'] = 1;
		}

		if (!checkSessionObject(CART_SESSION_VAR, $_GET['id'])) {
			$_SESSION[CART_SESSION_VAR][$_GET['id']] = $_POST['productQuantity'];
		} else {
			$_SESSION[CART_SESSION_VAR][$_GET['id']] += $_POST['productQuantity'];
		}
		redirect('products');
		exit;
	}
}