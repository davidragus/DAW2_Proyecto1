<?php

namespace App\Controllers;

use App\Models\OrderDAO;

class ordersController extends commonController
{

	public function index()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Your Profile",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'orders/index',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];
		view('template', $pageParams);
	}

	public function createOrder()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		OrderDAO::insertOrder(null);
		unset($_SESSION[CART_SESSION_VAR]);
		// TODO: Redirect to your orders page
		redirect('');
	}

}