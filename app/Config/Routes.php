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
//$routes->get('/Home', 'Home::index');
$routes->post('/AdminSignin', 'Admin::index');
$routes->get('/AdminSignin', 'Admin::index');
$routes->get('/Logout', 'Admin::Logout');
$routes->get('/User', 'User::index');
$routes->get('/User', 'User::index');
$routes->get('/MyAsset', 'Myasset::index');
$routes->post('/callDataJson', 'Myasset::dataJson');
$routes->post('/addAsset', 'Myasset::insertAsset');
$routes->post('/AssetDelete', 'Myasset::deleteAsset');
$routes->post('/modalEditAsset', 'Myasset::modalEdit');
$routes->post('/assetEdit', 'Myasset::editAsset');



