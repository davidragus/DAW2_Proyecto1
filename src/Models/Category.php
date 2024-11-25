<?php

namespace App\Models;

class Category
{

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

}