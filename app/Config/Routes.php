<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('user', 'Users::index');
$routes->get('user/create', 'Users::create');
$routes->get('user/(:any)', 'Users::detail/$1');
$routes->post('user/save', 'Users::save');
