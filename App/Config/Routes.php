<?php
use Core\Routes;

$routes = new Routes();


$routes->defaultController('Login');
$routes->defaultMethod('index');

$routes->add('mgroupuser', 'M_groupuser');
$routes->add('mgroupuser/add', 'M_groupuser/add');
$routes->add('mgroupuser/addsave', 'M_groupuser/add');
$routes->add('mgroupuser/edit', 'M_groupuser/edit');