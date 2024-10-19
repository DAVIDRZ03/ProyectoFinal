<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 * */
$routes->get('/', 'Home::index');
//$routes->get("articles", "Articles::index");
//$routes->get('articles/(:num)', 'Articles::show/$1');
//$routes->get("articles/new", "Articles::new", ["as" => "new_article"]);
//$routes->post("articles", "Articles::create");
//$routes->get("articles/(:num)/edit", "Articles::edit/$1");
//$routes->patch('articles/(:num)', 'Articles::update/$1');
//$routes->delete('articles/(:num)', 'Articles::delete/$1');


service('auth')->routes($routes);

$routes->group("",["filter" => "login"], static function ($routes){

    $routes->get("set-password", "Password::set");
    $routes->post("set-password", "Password::update"); 

    $routes->get("articles/(:num)/delete", "Articles::confirmDelete/$1");

    $routes->post("articles/update/(:num)", "Articles::update/$1");

    $routes->resource("articles", ["placeholder" => "(:num)"]);

    $routes->GET("articles/(:num)/image/edit", "Article\Image::new/$1");
    $routes->POST("articles/(:num)/image/create", "Article\Image::create/$1");

    $routes->GET("articles/(:num)/image", "Article\Image::get/$1");
    $routes->POST("articles/(:num)/image/delete", "Article\Image::delete/$1");

});  




/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
