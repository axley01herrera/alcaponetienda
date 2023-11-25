<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

# Auth
$routes->get('Auth/admin', 'Auth::admin');
$routes->post('Auth/loginAdmin', 'Auth::loginAdmin');

# Control Panel
$routes->get('ControlPanel/dashboard', 'ControlPanel::dashboard');

