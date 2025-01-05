<?php

namespace App\Controllers;

class adminController extends commonController
{

	public function __construct()
	{
		parent::__construct();
		$this->pageHeader = 'admin/common/adminHeader';
	}

	public function index()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/index',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function products()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/products/products',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function showProduct()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/products/showProduct',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function createProduct()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/products/common/productForm',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function editProduct()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/products/common/productForm',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'form_type' => 'edit'
			]
		];

		view('template', $pageParams);
	}

	public function orders()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/orders/orders',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}
	public function showOrder()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/orders/showOrder',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function editOrderStatus()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/orders/common/orderForm',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function users()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/users/users',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function showUser()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/users/showUser',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function createUser()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/users/common/userForm',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function editUser()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/users/common/userForm',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'form_type' => 'edit'
			]
		];

		view('template', $pageParams);
	}

	public function logs()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (!checkSessionVarValue(ROLE_SESSION_VAR, 'ADMIN')) {
			redirect("");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/logs/logs',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

}