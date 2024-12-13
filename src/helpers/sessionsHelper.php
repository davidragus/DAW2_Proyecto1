<?php

function checkIfLoggedIn()
{
	if (isset($_SESSION['userSession'])) {
		redirect('homepage');
		return true;
	}
	return false;
}