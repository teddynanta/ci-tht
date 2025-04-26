<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::register');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerProcess');
$routes->get('/login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('/logout', 'Auth::logout');
