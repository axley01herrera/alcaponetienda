<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

# Admin
$routes->get('Auth/admin', 'Auth::admin');
