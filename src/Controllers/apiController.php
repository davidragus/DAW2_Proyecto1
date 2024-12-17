<?php

namespace App\Controllers;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

use App\Models\UserDAO;

class apiController
{

	public function getUsers()
	{
		$filters = [];
		if (isset($_GET['role']))
			$filters['role'] = $_GET['role'];
		if (isset($_GET['email']))
			$filters['email'] = "%" . $_GET['email'] . "%";
		if (isset($_GET['first_name']))
			$filters['first_name'] = "%" . $_GET['first_name'] . "%";
		if (isset($_GET['last_name']))
			$filters['last_name'] = "%" . $_GET['last_name'] . "%";

		$users = UserDAO::getUsersArray($filters);

		echo json_encode([
			'status' => 'success',
			'data' => $users
		]);
	}

}