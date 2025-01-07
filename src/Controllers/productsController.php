<?php

namespace App\Controllers;

use App\Models\CategoryDAO, App\Models\ProductDAO, App\Models\OfferDAO;

class productsController extends commonController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$offers = OfferDAO::getActiveOffers();
		$productsInOffer = [];
		foreach ($offers as $offer) {
			foreach ($offer->getProducts() as $product) {
				$productsInOffer[] = $product->getId();
			}
		}

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
				$finalArray[$categoryName] = [];
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
				'products' => $finalArray,
				'productsInOffer' => $productsInOffer
			]
		];
		view('template', $pageParams);

	}

	public function show()
	{

		// TODO: Agregar comprobaciones

		if (isset($_GET['id'])) {

			$product = ProductDAO::getProductById($_GET['id']);

			if ($product) {
				$offers = OfferDAO::getActiveOffers();
				$productInOffer = null;
				foreach ($offers as $offer) {
					foreach ($offer->getProducts() as $offerProduct) {
						if ($offerProduct->getId() == $product->getId())
							$productInOffer = [
								'isPercentage' => $offer->getIsPercentage(),
								'offerValue' => $offer->getOfferValue(),
								'productPrice' => $offer->getIsPercentage() ? $product->getPrice() - $product->getPrice() * ($offer->getOfferValue() / 100) : $product->getPrice() - $offer->getOfferValue()
							];
					}
				}

				$pageParams = [
					'pageTitle' => "Tiefling's Tavern - Product Details",
					'pageHeader' => $this->pageHeader,
					'pageContent' => 'products/show',
					'pageFooter' => $this->pageFooter,
					'variables' => [
						'product' => $product
					]
				];
				if (isset($productInOffer)) {
					$pageParams['variables'] += ['productInOffer' => $productInOffer];
				}
				view('template', $pageParams);
				exit;
			}
		} else {
		}

	}

}