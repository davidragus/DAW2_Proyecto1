<?php

namespace App\Controllers;

use App\Models\CategoryDAO;
use App\Models\ProductDAO;

class productsController extends commonController
{
	public function index()
	{

		$categories = CategoryDAO::getCategories();
		$subcategories = CategoryDAO::getSubcategories();
		$products = ProductDAO::getProducts();
		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Products",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'products/index',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'products' => $products,
				'categories' => $categories,
				'subcategories' => $subcategories
			]
		];

		view('template', $pageParams);

	}
}