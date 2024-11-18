<?php

namespace App\Controllers;

class homepageController extends commonController
{
	protected $pageHeader = 'common/mainHeader';
	protected $pageFooter = 'common/mainFooter';

	public function index()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern",
			'pageHeader' => $this->pageHeader,
			'pageFooter' => $this->pageFooter,
		];

		view('template', $pageParams);
	}
}