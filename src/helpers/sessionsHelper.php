<?php

function checkSessionVar($key)
{
	if (isset($_SESSION[$key]))
		return true;
	return false;
}