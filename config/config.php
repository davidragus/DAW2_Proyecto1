<?php

define('DEVELOPER_MODE', 1);
define('DB_HOST', DEVELOPER_MODE ? 'localhost' : '');
define('DB_USER', 'root');
define('DB_PASSWORD', 'admin');
define('DB_DATABASE', 'tieflingstavern');

define('DEFAULT_CONTROLLER', 'App\\Controllers\\homepageController');
define('DEFAULT_ACTION', 'index');
define('ASSETS_PATH', '/assets/');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . "/");
define('APPLICATION_PATH', BASE_PATH . 'src/');
define('VIEWS_PATH', APPLICATION_PATH . "Views/");
define('DEFAULT_PASS', '$2y$10$Qq3vSiBKGHxBX6aB8C2Ayu/a6QlEedRKDIU6R9UZstLtJue7fvVLe');

define('USER_SESSION_VAR', 'userSession');
define('ROLE_SESSION_VAR', 'roleSession');
define('CART_SESSION_VAR', 'cartSession');