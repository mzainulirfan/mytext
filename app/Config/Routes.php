<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->get('dashboard', 'Dashboard::index');
$routes->group('user', function ($routes) {
  $routes->get('/', 'Users::index');
  $routes->get('create', 'Users::create');
  $routes->get('(:any)', 'Users::detail/$1');
  $routes->post('save', 'Users::save');
  $routes->post('/', 'Users::index');
  $routes->post('createAccount', 'Users::createAccount');
  $routes->post('changePassword', 'Users::changePassword');
  $routes->delete('(:num)', 'Users::delete/$1');
  $routes->post('update', 'Users::update');
});

$routes->Group('article', function ($routes) {
  $routes->get('/', 'Articles::index');
  $routes->get('create', 'Articles::create');
  $routes->post('save', 'Articles::save');
  $routes->post('/', 'Articles::index');
  $routes->get('(:any)', 'Articles::detail/$1');
  $routes->delete('(:num)', 'Articles::delete/$1');
  $routes->post('(:any)', 'Articles::publish/$1');
});