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

		$userAddresses = AddressDAO::getAddressesByUserId($_SESSION[USER_SESSION_VAR]);
		// TODO: Añadir mensaje de que ya has llegado al limite de direcciones
		if (count($userAddresses) >= 5) {
			redirect('users');
			exit;
		}

		$pageParams = [
			'pageTitle' => "Tiefling's Tavern - Create address",
			'pageHeader' => $this->pageHeader,
			'pageContent' => 'addresses/addressForm',
			'pageFooter' => $this->pageFooter,
			'variables' => [
				'formType' => 'add'
			]
		];
		view('template', $pageParams);
	}

	public function store()
	{
		if (!isset($_POST['alias'])) {
			redirect('');
			exit;
		}

		$addressData = [
			'alias' => $_POST['alias'],
			'city' => $_POST['city'],
			'cp' => $_POST['cp'],
			'address' => $_POST['address']
		];
		AddressDAO::insertAddress($_SESSION[USER_SESSION_VAR], $addressData);
		redirect('users');
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
			if ($address && $address->getUserId() == $_SESSION[USER_SESSION_VAR]) {
				$pageParams = [
					'pageTitle' => "Tiefling's Tavern - Create address",
					'pageHeader' => $this->pageHeader,
					'pageContent' => 'addresses/addressForm',
					'pageFooter' => $this->pageFooter,
					'variables' => [
						'formType' => 'edit',
						'address' => $address
					]
				];
			} else {
				// TODO: Modificar parametros para cuando la direccion no le pertenece al usuario
				$pageParams = [
					'pageTitle' => "Tiefling's Tavern - Create address",
					'pageHeader' => $this->pageHeader,
					'pageContent' => 'addresses/addressForm',
					'pageFooter' => $this->pageFooter,
					'variables' => [
						'formType' => 'edit',
						'address' => $address
					]
				];
			}
			view('template', $pageParams);

		}

	}

	public function update()
	{
		if (!isset($_POST['alias'])) {
			redirect('');
			exit;
		}

		if (isset($_GET['id'])) {
			$address = AddressDAO::getAddressById($_GET['id']);

			if ($address || $address->getUserId() == $_SESSION[USER_SESSION_VAR]) {
				$addressData = [
					'alias' => empty(trim($_POST['alias'])) ? $address->getAlias() : $_POST['alias'],
					'city' => empty(trim($_POST['city'])) ? $address->getCity() : $_POST['city'],
					'cp' => empty(trim($_POST['cp'])) ? $address->getCP() : $_POST['cp'],
					'address' => empty(trim($_POST['address'])) ? $address->getAddress() : $_POST['address']
				];
				AddressDAO::updateAddress($_GET['id'], $addressData);
				redirect('users');
			}
		}

	}

	public function destroy()
	{
		if (!checkSessionVar(USER_SESSION_VAR)) {
			redirect("users/login");
			exit;
		}
		if (isset($_GET['id'])) {
			$address = AddressDAO::getAddressById($_GET['id']);

			if ($address || $address->getUserId() == $_SESSION[USER_SESSION_VAR]) {
				AddressDAO::deleteAddress($_GET['id']);
				redirect('users');
				exit;
			}
		}

	}

}