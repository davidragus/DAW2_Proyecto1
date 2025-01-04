<?php

namespace App\Models;

class OfferProduct
{

	protected $offer_id, $product_id;

	public function getOfferId()
	{
		return $this->offer_id;
	}
	public function getProductId()
	{
		return $this->product_id;
	}

	public function toArray()
	{
		return [
			'offer_id' => $this->getOfferId(),
			'product_id' => $this->getProductId()
		];
	}

}