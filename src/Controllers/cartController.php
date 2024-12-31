<?php

namespace App\Controllers;

use App\Models\ProductDAO, App\Models\AddressDAO, App\Models\OrderDAO;

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

		if (checkSessionVar(CART_SESSION_VAR) && !empty($_SESSION[CART_SESSION_VAR])) {
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

			$addresses = AddressDAO::getAddressesByUserId($_SESSION[USER_SESSION_VAR]);

			$pageParams = [
				'pageTitle' => "Tiefling's Tavern",
				'pageHeader' => $this->pageHeader,
				'pageContent' => 'cart/index',
				'pageFooter' => $this->pageFooter,
				'variables' => [
					'userCart' => $userCart
				]
			];
			if ($addresses) {
				$pageParams['variables'] += ['addresses' => $addresses];
			}
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

	public function deleteFromCart()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}

		if (checkSessionObject(CART_SESSION_VAR, $_GET['id'])) {
			unset($_SESSION[CART_SESSION_VAR][$_GET['id']]);
		}

		redirect('cart');

	}

	public function addOneToCart()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}

		if (checkSessionObject(CART_SESSION_VAR, $_GET['id'])) {
			$_SESSION[CART_SESSION_VAR][$_GET['id']] += 1;
		}

		redirect('cart');
	}

	public function removeOneFromCart()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}

		if (checkSessionObject(CART_SESSION_VAR, $_GET['id'])) {
			$_SESSION[CART_SESSION_VAR][$_GET['id']] -= 1;
			if ($_SESSION[CART_SESSION_VAR][$_GET['id']] < 1) {
				unset($_SESSION[CART_SESSION_VAR][$_GET['id']]);
			}
		}

		redirect('cart');
	}

	public function repeatLastOrder()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect('users/login');
			exit;
		}
		if (!isset($_GET['id'])) {
			redirect('orders');
			exit;
		}

		$order = OrderDAO::getOrderById($_GET['id']);
		if ($order->getUserId() != $_SESSION[USER_SESSION_VAR]) {
			redirect('orders');
			exit;
		}

		$orderLines = $order->getOrderLines();
		unset($_SESSION[CART_SESSION_VAR]);
		foreach ($orderLines as $orderLine) {
			$_SESSION[CART_SESSION_VAR][$orderLine->getProductId()] = $orderLine->getAmount();
		}
		redirect('cart');

	}

}