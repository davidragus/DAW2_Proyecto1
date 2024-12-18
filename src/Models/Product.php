<?php

namespace App\Models;

class Product
{

	protected $product_id, $category_id, $subcategory_id, $name, $description, $price, $image, $adults_only;

	public function getId()
	{
		return $this->product_id;
	}

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function getSubcategoryId()
	{
		return $this->subcategory_id;
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

	public function getAdultsOnly()
	{
		return $this->adults_only;
	}

	public function toArray()
	{
		return [
			'id' => $this->getId(),
			'category' => $this->getCategoryId(),
			'subcategory' => $this->getSubcategoryId(),
			'name' => $this->getName(),
			'description' => $this->getDescription(),
			'price' => $this->getPrice(),
			'image' => $this->getImage(),
			'adults_only' => $this->getAdultsOnly(),
		];
	}

}