<?php

define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS, TRUE);

require BASE_PATH.'vendor/autoload.php';

$app		= System\App::instance();
$app->request  	= System\Request::instance();
$app->route	= System\Route::instance($app->request);

$route		= $app->route;

// Your routes go here

$route->resource('/mgroupuser', 'App\Controllers\M_groupuser');
// $route->get('/mgroupuser/add', 'App\Controllers\M_groupuser@add');
// $route->get('/mgroupuser/addsave', 'App\Controllers\M_groupuser@addsave');
// $route->get('/mgroupuser/edit/?', 'App\Controllers\M_groupuser@edit');
// $route->get('/mgroupuser/delete/?', 'App\Controllers\M_groupuser@delete');

$route->end();
