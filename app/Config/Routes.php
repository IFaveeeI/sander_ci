<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/user/add','UserController::adduser');
$routes->post('/storeUser','USerController::adduser');
