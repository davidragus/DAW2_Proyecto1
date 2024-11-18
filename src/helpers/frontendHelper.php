<?php

// TODO: Add more customization options
function view($fileName)
{
    require_once(VIEWS_PATH . "$fileName.php");
}