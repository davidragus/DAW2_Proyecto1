<?php

// TODO: Add more customization options
function view($fileName, $params = null)
{
    require_once(VIEWS_PATH . "$fileName.php");
}