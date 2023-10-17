<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('MainPage', 'MainProductController::Main_Page'); // MAIN PAGE

$routes->get('loginPage', 'UserController::loginPage'); // LOGIN ROUTE
$routes->post('login', 'UserController::login');

$routes->get('register', 'UserController::registerPage'); // REGISTER ROUTE
$routes->post('register', 'UserController::register');
