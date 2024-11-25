<?php

function url($url)
{
	$scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
	return "$scheme://{$_SERVER['SERVER_NAME']}/$url";
}

function redirect($url)
{
	$fullUrl = url($url);
	header("Location: $fullUrl");
}