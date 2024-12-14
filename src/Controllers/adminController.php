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
}