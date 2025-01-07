<?php

namespace App\Models;

class OrderLine
{

	protected $order_id, $line_id, $product_id, $quantity, $unit_price;

	public function getOrderId()
	{
		return $this->order_id;
	}

	public function getLineId()
	{
		return $this->line_id;
	}

	public function getProductId()
	{
		return $this->product_id;
	}

	public function getAmount()
	{
		return $this->quantity;
	}

	public function getUnitPrice()
	{
		return $this->unit_price;
	}

	public function toArray()
	{
		return [
			'order_id' => $this->getOrderId(),
			'line_id' => $this->getLineId(),
			'product_id' => $this->getProductId(),
			'quantity' => $this->getAmount(),
			'unit_price' => $this->getUnitPrice()
		];
	}

}