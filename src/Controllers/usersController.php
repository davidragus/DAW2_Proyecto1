<?php

namespace App\Controllers;

use App\Models\UserDAO, App\Models\AddressDAO;

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
		$addresses = AddressDAO::getAddressesByUserId($_SESSION[USER_SESSION_VAR]);

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Edit your profile",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'users/index',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'user' => $user
			]
		];
		if (!empty($addresses)) {
			$pageParams['variables'] += ['addresses' => $addresses];
		}
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
			$_SESSION['error'] = 'ERROR: The email used is not registered';
			exit;
		}
		if (!password_verify($_POST['password'], $user->getPassword())) {
			redirect('users/login');
			$_SESSION['error'] = 'ERROR: The password is incorrect';
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
			$_SESSION['error'] = 'ERROR: The email is already registered.';
			exit;
		}
		if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST['password'])) {
			redirect('users/signup');
			$_SESSION['error'] = 'ERROR: The password doesn\'t match the criteria.';
			exit;
		}
		if ($_POST['password'] != $_POST['confirmPassword']) {
			redirect('users/signup');
			$_SESSION['error'] = 'ERROR: The password confirmation doesn\'t match with the password.';
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
				$_SESSION['dataUpdateError'] = 'ERROR: The email is already registered.';
				exit;
			}
		}

		UserDAO::updateUserInfo($_SESSION[USER_SESSION_VAR], $_POST['firstName'], $_POST['lastName'], $_POST['email']);
		$_SESSION['dataUpdateSuccess'] = 'Your information has been changed successfully.';
		redirect('users');

	}

	public function changePassword()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		$user = UserDAO::getUserById($_SESSION[USER_SESSION_VAR]);
		if (!isset($_POST['currentPassword']) || !password_verify($_POST['currentPassword'], $user->getPassword())) {
			redirect('users');
			$_SESSION['passwordError'] = 'ERROR: The password introduced doesn\'t match with the current password.';
			exit;
		}

		if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,20}$/', $_POST['newPassword'])) {
			redirect('users');
			$_SESSION['passwordError'] = 'ERROR: The new password doesn\'t match the criteria.';
			exit;
		}

		if ((!isset($_POST['newPassword']) || !isset($_POST['confirmPassword'])) || $_POST['newPassword'] != $_POST['confirmPassword']) {
			redirect('users');
			$_SESSION['passwordError'] = 'ERROR: The password confirmation doesn\'t match with the new password.';
			exit;
		}

		UserDAO::updateUserPassword($_SESSION[USER_SESSION_VAR], password_hash($_POST['newPassword'], PASSWORD_DEFAULT));
		$_SESSION['passwordSuccess'] = 'The password has been changed successfully.';
		redirect('users');

	}

}