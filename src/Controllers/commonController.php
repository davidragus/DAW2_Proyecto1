<?php

namespace App\Controllers;

abstract class commonController
{

	protected $pageHeader = 'common/mainHeader';
	protected $pageFooter = 'common/mainFooter';

	public function __construct()
	{
		session_start();
	}

	abstract function index();

}