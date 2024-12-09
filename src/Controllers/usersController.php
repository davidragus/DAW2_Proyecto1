<?php

namespace App\Controllers;

use App\Models\UserDAO, App\Models\User;

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

	public function register()
	{
		$user = UserDAO::getUserByMail($_POST['email']);
		if ($user) {
			redirect('users/signup');
			return;
		}
		if (
			!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST['password'])
		) {
			redirect('users/signup');
			return;
		}
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		UserDAO::createUser($_POST['email'], $password, $_POST['firstName'], $_POST['lastName']);
		redirect('homepage');
	}
}