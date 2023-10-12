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
$routes->get('/User', 'User::index');
$routes->get('/MyAsset', 'Myasset::index');
$routes->post('/callDataJson', 'Myasset::dataJson');
$routes->post('/addAsset', 'Myasset::insertAsset');
$routes->post('/AssetDelete', 'Myasset::deleteAsset');
$routes->post('/modalEditAsset', 'Myasset::modalEdit');
$routes->post('/assetEdit', 'Myasset::editAsset');
$routes->post('/showAsset', 'Myasset::show_asset');
$routes->post('/showAssetStatus', 'Myasset::show_asset_status');

$routes->get('/DataLoan', 'Loan::index');
$routes->post('/dataJsonLoan', 'Loan::dataJson');
$routes->post('/checkSchedule', 'Loan::ScheduleCheck');
$routes->post('/addLoan', 'Loan::addLoan');
$routes->post('/loanDelete', 'Loan::deleteLoan');
$routes->post('/statusLoanUp', 'Loan::updateStatusLoan');
$routes->post('/detailLoan', 'Myasset::loan_detail');



