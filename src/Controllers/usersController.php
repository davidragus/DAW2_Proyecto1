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

		$user = UserDAO::getUserById($_SESSION[USER_SESSION_VAR]);

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Edit your profile",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'users/index',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'user' => $user
			]
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
		if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST['password'])) {
			redirect('users/signup');
			exit;
		}
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$newUserId = UserDAO::createUser($_POST['email'], $password, $_POST['firstName'], $_POST['lastName']);
		$_SESSION[USER_SESSION_VAR] = $newUserId;
		$_SESSION[ROLE_SESSION_VAR] = 'USER';
		redirect('');
	}

	public function logout()
	{
		if (checkSessionVar(USER_SESSION_VAR)) {
			session_destroy();
		}
		redirect('');
	}

	// TODO: Añadir mensajes de error o de confirmación del cambio
	public function changeInfo()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		$user = UserDAO::getUserById($_SESSION[USER_SESSION_VAR]);

		if (empty($_POST['firstName']))
			$_POST['firstName'] = $user->getFirstName();
		if (empty($_POST['lastName']))
			$_POST['lastName'] = $user->getLastName();
		if (empty($_POST['email'])) {
			$_POST['email'] = $user->getEmail();
		} else {
			$checkUser = UserDAO::getUserByMail($_POST['email']);
			if ($checkUser && $checkUser->getUserId() != $_SESSION[USER_SESSION_VAR]) {
				redirect('users');
				exit;
			}
		}

		UserDAO::updateUserInfo($_SESSION[USER_SESSION_VAR], $_POST['firstName'], $_POST['lastName'], $_POST['email']);
		redirect('users');

	}

	// TODO: Añadir mensajes de error o de confirmación del cambio
	public function changePassword()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		$user = UserDAO::getUserById($_SESSION[USER_SESSION_VAR]);
		if (!isset($_POST['currentPassword']) || !password_verify($_POST['currentPassword'], $user->getPassword())) {
			redirect('users');
			exit;
		}

		if ((!isset($_POST['newPassword']) || !isset($_POST['confirmPassword'])) || $_POST['newPassword'] != $_POST['confirmPassword']) {
			redirect('users');
			exit;
		}

		if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST['newPassword'])) {
			redirect('users');
			exit;
		}

		UserDAO::updateUserPassword($_SESSION[USER_SESSION_VAR], password_hash($_POST['newPassword'], PASSWORD_DEFAULT));
		redirect('users');

	}

}