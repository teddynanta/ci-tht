<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::register');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerProcess');
