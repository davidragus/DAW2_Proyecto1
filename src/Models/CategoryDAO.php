<?php

namespace App\Models;

use DBConnection;

abstract class CategoryDAO
{

	public static function getCategories()
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM categories WHERE subcategory IS NULL");
		$stmt->execute();
		$result = $stmt->get_result();
		$categories = [];
		while ($rows = $result->fetch_object('App\\Models\\Category')) {
			$categories[] = $rows;
		}
		return $categories;
	}

	public static function getCategory($categoryId)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM categories WHERE category_id = ?");
		$stmt->bind_param("i", $categoryId);
		$stmt->execute();
		$result = $stmt->get_result();
		$categories = [];
		while ($rows = $result->fetch_object('App\\Models\\Category')) {
			$categories[] = $rows;
		}
		return $categories;
	}

	public static function getSubcategories($category)
	{
		$conn = DBConnection::connect();
		$stmt = $conn->prepare("SELECT * FROM categories WHERE parent_id = ?");
		$categoryId = $category->getCategoryId();
		$stmt->bind_param("i", $categoryId);
		$stmt->execute();
		$result = $stmt->get_result();
		$subcategories = [];
		while ($rows = $result->fetch_object('App\\Models\\Category')) {
			$subcategories[] = $rows;
		}
		return $subcategories;
	}

	public static function getCategoriesArray()
	{
		$conn = DBConnection::connect();
		$query = "SELECT * FROM categories";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$result = $stmt->get_result();
		$categories = [];
		while ($rows = $result->fetch_object("App\\Models\\Category")) {
			$categories[] = $rows->toArray();
		}
		return $categories;
	}

}