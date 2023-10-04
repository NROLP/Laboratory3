<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/', 'Home::index');
$routes->get('/main', 'MainProductController::test');


$routes->get('/login', 'UserController::login');

$routes->post('/login', 'UserController::authenticate');

$routes->get('/register', 'UserController::register');

$routes->post('/register', 'UserController::createUser');

$routes->get('/logout', 'UserController::logout');
