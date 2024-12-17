<?php

namespace App\Models;

class User
{

	protected $user_id, $role, $email, $password, $first_name, $last_name;

	public function getUserId()
	{
		return $this->user_id;
	}

	public function getRole()
	{
		return $this->role;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function toArray()
	{
		return [
			"id" => $this->getUserId(),
			"role" => $this->getRole(),
			"email" => $this->getEmail(),
			"password" => $this->getPassword(),
			"first_name" => $this->getFirstName(),
			"last_name" => $this->getLastName()
		];
	}

}