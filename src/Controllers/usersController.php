<?php

namespace App\Controllers;

use App\Models\UserDAO;

class usersController extends commonController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
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
		if (checkSessionVar(USER_SESSION_VAR)) {
			redirect('');
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
		if (checkSessionVar(USER_SESSION_VAR)) {
			redirect('');
			exit;
		} else if (!isset($_POST['email'])) {
			redirect('users/login');
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

		$_SESSION[USER_SESSION_VAR] = $user->getUserId();
		$_SESSION[ROLE_SESSION_VAR] = $user->getRole();
		redirect('');
	}

	public function signup()
	{
		if (checkSessionVar(USER_SESSION_VAR)) {
			redirect('');
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
		if (checkSessionVar(USER_SESSION_VAR)) {
			redirect('');
			exit;
		} else if (!isset($_POST['email'])) {
			redirect('users/signup');
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
		$_SESSION[USER_SESSION_VAR] = $newUserId;
		$_SESSION[ROLE_SESSION_VAR] = 'USER';
		redirect('');
	}
}