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
		$products = ProductDAO::getProductsByIds(array_keys($_SESSION[CART_SESSION_VAR]));
		$userCart = [];
		foreach ($products as $product) {
			$userCart[$product->getName()] = [
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
	}

	public function addToCart()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}

		if (!checkSessionObject(CART_SESSION_VAR, $_GET['id'])) {
			$_SESSION[CART_SESSION_VAR][$_GET['id']] = 1;
		} else {
			$_SESSION[CART_SESSION_VAR][$_GET['id']] += 1;
		}
		redirect('products');
		exit;
	}
}