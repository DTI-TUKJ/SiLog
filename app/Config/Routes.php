<?php

use CodeIgniter\Router\RouteCollection;


$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/AdminSignin', 'Admin::index');
$routes->get('/AdminSignin', 'Admin::index');
$routes->get('/Logout', 'Admin::Logout');
$routes->get('/User', 'User::index');
