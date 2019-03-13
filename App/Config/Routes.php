<?php

define('DS', DIRECTORY_SEPARATOR, true);
define('BASE_PATH', __DIR__ . DS, TRUE);

require BASE_PATH.'vendor/autoload.php';

$app		= System\App::instance();
$app->request  	= System\Request::instance();
$app->route	= System\Route::instance($app->request);

$route		= $app->route;

// Your routes go here
$route->get('/migration', 'App\Controllers\Db_migration@migrate');


$route->get('/', 'App\Controllers\Login@index');
$route->get('/home', 'App\Controllers\Home@index');

$route->group('/login', function()
{
    $this->get('/', 'App\Controllers\Login@index');
    $this->post('/dologin', 'App\Controllers\Login@dologin');
    $this->get('/dologout', 'App\Controllers\Login@dologout');
});

$route->group('/mgroupuser', function()
{
    $this->get('/', 'App\Controllers\M_groupuser@index');
    $this->get('/add', 'App\Controllers\M_groupuser@add');
    $this->post('/addsave', 'App\Controllers\M_groupuser@addsave');
    $this->get('/edit/?', 'App\Controllers\M_groupuser@edit');
    $this->post('/editsave', 'App\Controllers\M_groupuser@editsave');
    $this->get('/delete/?', 'App\Controllers\M_groupuser@delete');
});

$route->end();
