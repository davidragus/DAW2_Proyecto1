<?php

// TODO: Add more customization options
function view($fileName, $params = null)
{
    $categories = \App\Models\CategoryDAO::getCategories();
    require(VIEWS_PATH . "$fileName.php");
}