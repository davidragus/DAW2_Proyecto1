<?php

namespace App\Controllers;

use App\Models\OrderDAO;
use App\Models\ProductDAO;

class ordersController extends commonController
{

	public function index()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		$orders = OrderDAO::getOrdersByUserId($_SESSION[USER_SESSION_VAR]);

		if (!empty($orders)) {

			$lastOrderLines = $orders['0']->getOrderLines();
			$products = [];
			foreach ($lastOrderLines as $orderLine) {
				$products[$orderLine->getProductId()] = ProductDAO::getProductById($orderLine->getProductId());
			}

			$pageParams = [
				'pageTitle' => "Tiefling's Tavern - Your Orders",
				'pageHeader' => $this->pageHeader,
				'pageContent' => 'orders/index',
				'pageFooter' => $this->pageFooter,
				'variables' => [
					'orders' => $orders,
					'lastOrderLines' => $lastOrderLines,
					'products' => $products
				]
			];
		} else {
			$pageParams = [
				'pageTitle' => "Tiefling's Tavern - Your Orders",
				'pageHeader' => $this->pageHeader,
				'pageContent' => 'orders/index',
				'pageFooter' => $this->pageFooter,
				'variables' => []
			];
		}
		view('template', $pageParams);
	}

	public function store()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!isset($_POST['addressId'])) {
			redirect("");
			exit;
		}

		OrderDAO::insertOrder($_SESSION[CART_SESSION_VAR], $_SESSION[USER_SESSION_VAR], $_POST['addressId']);
		unset($_SESSION[CART_SESSION_VAR]);
		redirect('orders');
	}

}