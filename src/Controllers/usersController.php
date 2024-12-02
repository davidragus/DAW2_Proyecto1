<?php

namespace App\Controllers;

class usersController extends commonController
{
	public function index()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Your Profile",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'users/index',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];
		view('template', $pageParams);
	}

	public function login()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Log In",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'users/login',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];
		view('template', $pageParams);
	}

	public function signup()
	{
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Sign Up",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'users/signup',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];
		view('template', $pageParams);
	}
}