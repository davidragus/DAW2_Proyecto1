<?php

namespace App\Models;

class Category
{

	protected $category_id, $name, $image;

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getImage()
	{
		return $this->image;
	}

}