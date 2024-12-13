<?php

namespace App\Controllers;

use App\Models\UserDAO, App\Models\User;

class usersController extends commonController
{
	public function index()
	{
		session_start();
		if (!checkIfLoggedIn()) {
			redirect("users/login");
			exit;
		}

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
		session_start();
		if (checkIfLoggedIn()) {
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Log In",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'users/login',
			'pageFooter' => $this->pageFooter,
			'variables' => []
		];
		view('template', $pageParams);
	}

	public function checkLogin()
	{
		session_start();
		if (checkIfLoggedIn()) {
			exit;
		}

		$user = UserDAO::getUserByMail($_POST['email']);
		if (!$user) {
			redirect('users/login');
			exit;
		}
		if (!password_verify($_POST['password'], $user->getPassword())) {
			redirect('users/login');
			exit;
		}

		$_SESSION['userSession'] = $user->getUserId();
		redirect('homepage');
	}

	public function signup()
	{
		session_start();
		if (checkIfLoggedIn()) {
			exit;
		}

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
		session_start();
		if (checkIfLoggedIn()) {
			exit;
		}

		$user = UserDAO::getUserByMail($_POST['email']);
		if ($user) {
			redirect('users/signup');
			exit;
		}
		if (
			!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST['password'])
		) {
			redirect('users/signup');
			exit;
		}
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$newUserId = UserDAO::createUser($_POST['email'], $password, $_POST['firstName'], $_POST['lastName']);
		$_SESSION['userSession'] = $newUserId;
		redirect('homepage');
	}
}