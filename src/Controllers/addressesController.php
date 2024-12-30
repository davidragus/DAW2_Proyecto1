<?php

namespace App\Controllers;

use App\Models\AddressDAO;

class addressesController extends commonController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect('');
	}

	public function create()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Create address",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'addresses/addressForm',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'form_type' => 'add'
			]
		];
		view('template', $pageParams);
	}

	public function store()
	{

	}

	public function edit()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}

		if (isset($_GET['id'])) {
			$address = AddressDAO::getAddressById($_GET['id']);

			// TODO: Añadir trycatch por si no encuentra la dirección por la id
			$pageParams = [
				'pageTitle' => "Tiefling's Tavern - Create address",
				'pageHeader' => $this->pageHeader,
				'pageContent' => 'addresses/addressForm',
				'pageFooter' => $this->pageFooter,
				'variables' => [
					'form_type' => 'edit',
					'address' => $address
				]
			];
			view('template', $pageParams);
		}

	}

	public function update()
	{

	}

}