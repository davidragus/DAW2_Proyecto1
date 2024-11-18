<?php

namespace App\Controllers;

abstract class commonController
{

	protected $pageHeader;
	protected $pageFooter;

	abstract function index();

}