<?php

namespace App\Models;

abstract class Product
{

	protected $product_id, $category_id, $name, $description, $price, $image;

	public function __construct($id, $categoryId, $name, $description, $price, $image)
	{
		$this->id = $id;
		$this->categoryId = $categoryId;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->image = $image;
	}

	public function getId()
	{
		return $this->product_id;
	}

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getImage()
	{
		return $this->image;
	}

}