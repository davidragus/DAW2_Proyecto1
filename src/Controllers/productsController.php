<?php

namespace App\Controllers;

use App\Models\CategoryDAO;
use App\Models\ProductDAO;

class productsController extends commonController
{
	public function index()
	{

		$categories = CategoryDAO::getCategories();
		$finalArray = [];
		foreach ($categories as $category) {
			$categoryId = $category->getCategoryId();
			if (isset($_GET['id']) && $_GET['id'] != $categoryId)
				continue;
			$categoryName = $category->getName();

			$subcategories = CategoryDAO::getSubcategories($category);
			$products = ProductDAO::getProductsByCategory($category);

			if (empty($subcategories)) {
				$finalArray[$categoryName] = $products;
			} else {
				foreach ($subcategories as $subcategory) {
					$subcategoryName = $subcategory->getName();
					$subcategoryId = $subcategory->getCategoryId();

					foreach ($products as $product) {
						if ($product->getSubcategoryId() == $subcategoryId) {
							$finalArray[$categoryName][$subcategoryName][] = $product;
						}
					}
				}
			}
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Products",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'products/index',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'categories' => $categories,
				'products' => $finalArray
			]
		];
		view('template', $pageParams);

	}
}