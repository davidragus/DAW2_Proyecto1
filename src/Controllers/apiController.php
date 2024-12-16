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
		$users = UserDAO::getUsersJson();

		if (empty($users)) {
			echo json_encode([
				'status' => 'error',
				'data' => 'No users found'
			]);
			exit;
		}

		echo json_encode([
			'status' => 'success',
			'data' => $users
		]);
	}

}