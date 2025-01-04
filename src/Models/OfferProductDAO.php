<?php

namespace App\Models;

use DBConnection;

abstract class OfferProductDAO
{

	public static function deleteProductFromOffer($productId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("DELETE FROM offers_products WHERE product_id = ?");
		$stmt->bind_param("i", $productId);
		$stmt->execute();
	}

}