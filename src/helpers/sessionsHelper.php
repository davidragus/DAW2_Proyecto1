<?php

function checkSessionVar($key)
{
	if (isset($_SESSION[$key]))
		return true;
	return false;
}

function checkSessionObject($key, $index)
{
	if (isset($_SESSION[$key][$index]))
		return true;
	return false;
}

function checkSessionVarValue($key, $value)
{
	if (checkSessionVar($key) && $_SESSION[$key] == $value)
		return true;
	return false;
}