<?php

define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS, TRUE);

require BASE_PATH.'vendor/autoload.php';

$app		= System\App::instance();
$app->request  	= System\Request::instance();
$app->route	= System\Route::instance($app->request);

$route		= $app->route;

// Your routes go here
$route->get('/mgroupuser', 'App\Controllers\M_groupuser@index');
// $route->group('/mgroupuser', function()
// {
//     $this->get('/', 'App\Controllers\M_groupuser@index');
//     $this->get('/add', 'App\Controllers\M_groupuser@add');
//     $this->post('/addsave', 'App\Controllers\M_groupuser@addsave');
//     $this->get('/edit/?', 'App\Controllers\M_groupuser@edit');
//     $this->post('/editsave', 'App\Controllers\M_groupuser@editsave');
//     $this->get('/delete/?', 'App\Controllers\M_groupuser@delete');
// });

$route->end();
