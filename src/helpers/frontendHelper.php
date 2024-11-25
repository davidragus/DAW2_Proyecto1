<?php

// TODO: Add more customization options
function view($fileName, $params = null)
{
    require(VIEWS_PATH . "$fileName.php");
}