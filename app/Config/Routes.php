<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->group("", ["filter" => "no-auth"] , function($routes){
    $routes->get('/', 'AuthController::index');  
    $routes->match(['get', 'post'], 'login', 'AuthController::login');
    $routes->get('registration', 'AuthController::registration');
    $routes->match(['get', 'post'], 'registration', 'AuthController::registration');
    $routes->match(['get', 'post'], 'forgot-password', 'AuthController::forgotPassword');
    $routes->match(['get', 'post'], 'reset-password/(:any)', 'AuthController::resetPassword/$1');
    $routes->match(['get', 'post'], 'reset-password', 'AuthController::resetPassword');
    $routes->match(['get', 'post'], 'thank-you', 'AuthController::thank_you');
});

$routes->group("", ["filter" => "auth"] , function($routes){
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('logout', 'AuthController::logout');
    $routes->match(['get', 'post'], 'update-password', 'AuthController::updatePassword');
    $routes->match(['get', 'post'], 'update-profile', 'Myprofile::updateProfile');
});
/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
