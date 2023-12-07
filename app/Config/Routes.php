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
$routes->get('/Silo', 'Home::index');

$routes->post('/Silo/AdminSignin', 'Admin::index');
$routes->post('/Silo/Signin', 'Admin::pgwSignin');
$routes->get('/Silo/AdminSignin', 'Admin::index');
$routes->get('/Silo/Signin', 'Admin::pgwSignin');
$routes->get('/Logout', 'Admin::Logout');
$routes->get('/Silo/User', 'User::index');
$routes->get('/Silo/User', 'User::index');
$routes->get('/Silo/MyAsset', 'Myasset::index');
$routes->post('/callDataJson', 'Myasset::dataJson');
$routes->post('/addAsset', 'Myasset::insertAsset');
$routes->post('/AssetDelete', 'Myasset::deleteAsset');
$routes->post('/modalEditAsset', 'Myasset::modalEdit');
$routes->post('/assetEdit', 'Myasset::editAsset');
$routes->post('/showAsset', 'Myasset::show_asset');
$routes->post('/showAssetStatus', 'Myasset::show_asset_status');

$routes->get('/Silo/DataLoan', 'Loan::index');
$routes->get('/Silo/loanHistory', 'Loan::history');
$routes->post('/dataJsonLoan', 'Loan::dataJson');
$routes->post('/checkSchedule', 'Loan::ScheduleCheck');
$routes->post('/addLoan', 'Loan::addLoan');
$routes->post('/loanDelete', 'Loan::deleteLoan');
$routes->post('/statusLoanUp', 'Loan::updateStatusLoan');
$routes->post('/detailLoan', 'Myasset::loan_detail');
$routes->post('/getNip', 'Loan::getPgw');

$routes->get('/Silo/MyLoan', 'MyLoan::index');
$routes->post('/dataJsonMyLoan', 'MyLoan::dataJson');



