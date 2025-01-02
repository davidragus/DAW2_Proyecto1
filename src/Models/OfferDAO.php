<?php

namespace App\Models;

use DBConnection;

abstract class OfferDAO
{

	public static function getActiveOffers()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM offers WHERE CURRENT_DATE() BETWEEN start_date AND ending_date");
		$stmt->execute();
		$result = $stmt->get_result();
		$offers = [];
		while ($rows = $result->fetch_object('App\\Models\\Offer')) {
			$rows->setProducts(ProductDAO::getProductsInOffer($rows->getOfferId()));
			$offers[] = $rows;
		}
		return $offers;
	}

}