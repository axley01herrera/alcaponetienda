<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

#### 
## Home 
####

$routes->get('/', 'Home::index');
$routes->post('Home/getCatContent', 'Home::getCatContent');
$routes->post('Home/getSubCatContent', 'Home::getSubCatContent');

#### 
## Auth 
####

$routes->get('Auth/admin', 'Auth::admin');
$routes->post('Auth/loginAdmin', 'Auth::loginAdmin');

#### 
## Control Panel 
####

$routes->get('ControlPanel/dashboard', 'ControlPanel::dashboard');
# Control Panel -> Categories
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
# Control Panel -> Products
$routes->get('ControlPanel/products', 'ControlPanel::products');
$routes->get('ControlPanel/productDetail', 'ControlPanel::productDetail');
$routes->post('ControlPanel/modalProduct', 'ControlPanel::modalProduct');
$routes->post('ControlPanel/getSelSubCatsByCat', 'ControlPanel::getSelSubCatsByCat');
$routes->post('ControlPanel/createProduct', 'ControlPanel::createProduct');
$routes->post('ControlPanel/updateProduct', 'ControlPanel::updateProduct');
$routes->post('ControlPanel/uploadProductImg', 'ControlPanel::uploadProductImg');
$routes->post('ControlPanel/removeProductImg', 'ControlPanel::removeProductImg');
$routes->post('ControlPanel/changeProductStatus', 'ControlPanel::changeProductStatus');
$routes->post('ControlPanel/productUpdateCat', 'ControlPanel::productUpdateCat');
$routes->post('ControlPanel/productUpdateSubCat', 'ControlPanel::productUpdateSubCat');


