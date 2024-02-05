<?php

define('__IMAGES__', '/public/images/');

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('dashboard', 'ContentController');
Router::get('filenotfound','ErrorController');
Router::get('login','SecurityController');
Router::get('logout','SecurityController');
Router::get('products','ContentController');
Router::get('shops','ContentController');
Router::get('getProducts','ContentController');
Router::get('addProduct','ContentController');
Router::get('register','SecurityController');
Router::get('userSettings','AccountController');
Router::run($path);