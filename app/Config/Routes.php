<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->resource('api/guests', ['controller' => 'GuestController']);
$routes->get('/', 'Guests::index');

$routes->group('guests', function ($routes) {
    $routes->get('/', 'Guests::index');
    $routes->get('create', 'Guests::create');
    $routes->post('store', 'Guests::store');
    $routes->get('(:num)/edit', 'Guests::edit/$1');
    $routes->post('(:num)/update', 'Guests::update/$1');
    $routes->delete('(:num)/delete', 'Guests::delete/$1');
});
