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
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/products',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function orders()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/orders',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}

	public function users()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'admin/users',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}
}