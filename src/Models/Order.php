<?php

namespace App\Models;

class Order
{

	protected $order_id, $user_id, $address_id, $date, $status, $orderlines;

	public function getOrderId()
	{
		return $this->order_id;
	}

	public function getUserId()
	{
		return $this->user_id;
	}

	public function getAddressId()
	{
		return $this->address_id;
	}

	public function getDate()
	{
		return $this->date;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function getOrderLines()
	{
		return $this->orderlines;
	}

	public function setOrderLines($orderLines)
	{
		$this->orderlines = $orderLines;
	}

	public function toArray()
	{
		return [
			'id' => $this->getOrderId(),
			'user_id' => $this->getUserId(),
			'address_id' => $this->getAddressId(),
			'date' => $this->getDate(),
			'status' => $this->getStatus(),
			'order_lines' => $this->getOrderLines()
		];
	}

}