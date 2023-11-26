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
$routes->get('ControlPanel/catgories', 'ControlPanel::catgories');
$routes->post('ControlPanel/groupCat', 'ControlPanel::groupCat');
$routes->post('ControlPanel/categoryDT', 'ControlPanel::categoryDT');
$routes->post('ControlPanel/modalCat', 'ControlPanel::modalCat');
$routes->post('ControlPanel/createCat', 'ControlPanel::createCat');
$routes->post('ControlPanel/updateCat', 'ControlPanel::updateCat');
$routes->post('ControlPanel/subCategoryDT', 'ControlPanel::subCategoryDT');
$routes->post('ControlPanel/modalSubCat', 'ControlPanel::modalSubCat');
$routes->post('ControlPanel/createSubCat', 'ControlPanel::createSubCat');
$routes->post('ControlPanel/updateSubCat', 'ControlPanel::updateSubCat');

