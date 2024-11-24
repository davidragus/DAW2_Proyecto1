<?php

namespace App\Controllers;

abstract class commonController
{

	protected $pageHeader = 'common/mainHeader';
	protected $pageFooter = 'common/mainFooter';

	abstract function index();

}