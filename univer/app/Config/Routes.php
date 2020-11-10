<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/contacts', 'Home::contacts');


$routes->match(['get','post'],'/signin', 'Auth::signin');
$routes->match(['get','post'],'/signup', 'Auth::signup');

$routes->get('/signout', 'Auth::signout');
$routes->get('/profile', 'Auth::profile');

$routes->match(['get','post'], '/faculties/create', 'Faculties::create');
$routes->get('/faculties/details/(:num)', 'Faculties::details/$1');
$routes->get('/faculties/delete/(:num)', 'Faculties::delete/$1');
$routes->get('/faculties/update/(:num)', 'Faculties::update/$1');


$routes->match(['get','post'], '/departments/create/(:num)', 'Departments::create/$1');
$routes->get('/departments/details/(:num)', 'Departments::details/$1');
$routes->get('/departments/delete/(:num)', 'Departments::delete/$1');
$routes->get('/departments/update/(:num)', 'Departments::update/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
