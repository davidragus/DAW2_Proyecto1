<?php

$defaultParams = [
    "pageTitle" => "Tiefling's Tavern",
];

// TODO: Add more customization options
function view($fileName, $params = $defaultParams)
{
    require_once(VIEWS_PATH . "$fileName.php");
}