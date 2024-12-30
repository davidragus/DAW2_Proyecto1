<?php

namespace App\Models;

class Address
{

	protected $address_id, $user_id, $alias, $city, $cp, $address;

	public function getAddressId()
	{
		return $this->address_id;
	}
	public function getUserId()
	{
		return $this->user_id;
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function getCP()
	{
		return $this->cp;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function toArray()
	{
		return [
			'id' => $this->getAddressId(),
			'user_id' => $this->getUserId(),
			'alias' => $this->getAlias(),
			'city' => $this->getCity(),
			'cp' => $this->getCP(),
			'address' => $this->getAddress()
		];
	}

}