<?php

namespace App\Models;

use DBConnection;

abstract class AddressDAO
{

	public static function insertAddress($userId, $addressData)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("INSERT addresses(user_id, alias, city, cp, address) VALUES(?, ?, ?, ?, ?)");
		$alias = $addressData['alias'];
		$city = $addressData['city'];
		$cp = $addressData['cp'];
		$address = $addressData['address'];
		$stmt->bind_param("issss", $userId, $alias, $city, $cp, $address);
		$stmt->execute();
	}

	public static function updateAddress($addressId, $addressData)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE addresses SET alias = ?, city = ?, cp = ?, address = ? WHERE address_id = ?");
		$alias = $addressData['alias'];
		$city = $addressData['city'];
		$cp = $addressData['cp'];
		$address = $addressData['address'];
		$stmt->bind_param("ssssi", $alias, $city, $cp, $address, $addressId);
		$stmt->execute();
	}

	public static function deleteAddress($addressId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("UPDATE orders SET address_id = NULL WHERE address_id = ?");
		$stmt->bind_param("i", $addressId);
		$stmt->execute();
		$stmt = $conn->prepare("DELETE FROM addresses WHERE address_id = ?");
		$stmt->bind_param("i", $addressId);
		$stmt->execute();
	}

	public static function getAddressesByUserId($userId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM addresses WHERE user_id = ?");
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$addresses = [];
		while ($rows = $result->fetch_object("App\\Models\\Address")) {
			$addresses[] = $rows;
		}
		return $addresses;
	}

	public static function getAddressesArrayByUserId($userId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM addresses WHERE user_id = ?");
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$addresses = [];
		while ($rows = $result->fetch_object("App\\Models\\Address")) {
			$addresses[] = $rows->toArray();
		}
		return $addresses;
	}

	public static function getAddressById($id)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM addresses WHERE address_id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$address = $result->fetch_object("App\\Models\\Address");
		return $address;
	}

	public static function deleteAddressByUserId($userId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("DELETE FROM addresses WHERE user_id = ?");
		$stmt->bind_param("i", $userId);
		$stmt->execute();
	}

}
