<?php

namespace App\Models;

class Category
{

	protected $category_id, $name, $subcategory, $parent_id;

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getSubcategory()
	{
		return $this->subcategory;
	}

	public function getParentId()
	{
		return $this->parent_id;
	}

	public function toArray()
	{
		return [
			'id' => $this->getCategoryId(),
			'name' => $this->getName(),
			'subcategory' => $this->getSubcategory(),
			'parent_id' => $this->getParentId(),
		];
	}

}