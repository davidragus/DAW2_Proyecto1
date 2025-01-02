<?php

namespace App\Models;

class Offer
{

	protected $offer_id, $offer_name, $is_percentage, $start_date, $ending_date, $offer_value, $products;

	public function getOfferId()
	{
		return $this->offer_id;
	}

	public function getOfferName()
	{
		return $this->offer_name;
	}

	public function getIsPercentage()
	{
		return $this->offer_id == 1 ? true : false;
	}

	public function getStartDate()
	{
		return $this->start_date;
	}

	public function getEndingDate()
	{
		return $this->ending_date;
	}

	public function getOfferValue()
	{
		return $this->offer_value;
	}

	public function getProducts()
	{
		return $this->products;
	}

	public function setProducts($products)
	{
		$this->products = $products;
	}

	public function toArray()
	{
		return [
			'id' => $this->getOfferId(),
			'name' => $this->getOfferName(),
			'is_percentage' => $this->getIsPercentage(),
			'start_date' => $this->getStartDate(),
			'ending_date' => $this->getEndingDate(),
			'offer_value' => $this->getOfferValue(),
			'products' => $this->getProducts()
		];
	}

}