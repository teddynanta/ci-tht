<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//auth
$routes->get('/', 'Auth::register');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerProcess');
$routes->get('/login', 'Auth::login');
$routes->post('login', 'Auth::loginProcess');

//dashboard
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('topup', 'Dashboard::topup');
$routes->post('/logout', 'Auth::logout');
$routes->post('topup', 'Dashboard::topUpProcess');
