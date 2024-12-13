<?php

namespace App\Controllers;

class homepageController extends commonController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'homepage/index',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];

		view('template', $pageParams);
	}
}