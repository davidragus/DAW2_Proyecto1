<?php

namespace App\Models;

class OrderLine
{

	protected $order_id, $line_id, $product_id, $product_modified, $quantity, $unit_price;

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

	public function getProductModified()
	{
		return $this->product_modified;
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
			'product_modified' => $this->getProductModified(),
			'quantity' => $this->getAmount(),
			'unit_price' => $this->getUnitPrice()
		];
	}

}