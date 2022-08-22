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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/services', 'ServiceController::index');
$routes->get('/services/(:segment)', 'ServiceController::index/$1');
$routes->get('/services/(:segment)/(:segment)', 'ServiceController::show/$1/$2');

$routes->group('', ['filter' => 'authguard:false'], function ($routes) {
    $routes->get('/login', 'AuthController::login');
    $routes->post('/login', 'AuthController::doLogin');
    $routes->get('/register', 'AuthController::register');
    $routes->post('/register', 'AuthController::doRegister');
});

$routes->group('', ['filter' => 'authguard:true'], function ($routes) {
    $routes->post('orders/(:segment)/chat', 'OrderController::chat/$1');
    $routes->get('/logout', 'AuthController::logout');
});


// Merchant
$routes->group('', ['filter' => 'roleguard:merchant'], function ($routes) {
    $routes->get('orders/(:segment)', 'OrderController::orderDetail/$1');
    $routes->get('orders/(:segment)/edit', 'OrderController::edit/$1');
    $routes->post('orders/(:segment)/add-service', 'OrderController::addService/$1');
    $routes->put('orders/(:segment)/update-services', 'OrderController::updateServices/$1');
});

$routes->group('merchant', ['filter' => 'roleguard:merchant'], function ($routes) {
    $routes->get('', 'Home::merchant');
    $routes->resource('services', ['controller' => 'Merchant\ServiceController']);
    $routes->patch('orders/(:num)/process', 'Merchant\OrderController::process/$1');
    $routes->patch('orders/(:num)/finish', 'Merchant\OrderController::finish/$1');
    $routes->resource('orders', ['controller' => 'Merchant\OrderController'], ['only' => ['index', 'show', 'edit', 'update']]);
});

//   Customer
$routes->group('', ['filter' => 'roleguard:customer'], function ($routes) {
    $routes->post('services/(:segment)/(:segment)', 'OrderController::doOrder/$1/$2');
    $routes->get('my-order', 'OrderController::myOrder');
    $routes->get('my-order/(:segment)', 'OrderController::orderDetail/$1');
    $routes->get('my-order/(:segment)/payment', 'OrderController::paymentForm/$1');
    $routes->post('my-order/(:segment)/payment', 'OrderController::payment/$1');
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
