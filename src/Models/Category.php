<?php

namespace App\Models;

class Category
{

	protected const product_model = [
		1 => "Starter",
		2 => "Sandwich",
		3 => "Dessert",
		4 => "Drink",
	];
	protected $category_id, $name, $subcategory, $parent_id, $image;

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getSubsubcategory()
	{
		return $this->subcategory;
	}

	public function getParentId()
	{
		return $this->parent_id;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function getProductModel($id)
	{
		return Category::product_model[$id];
	}

}