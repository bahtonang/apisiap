<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Api');
$routes->setDefaultMethod('getVersi');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',['filter'=>'otentikasi']);
#$routes->get('/', 'Home::index',['otentikasi']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

//$routes->post('login', 'Otentikasi::getPersonal');
$routes->get('teknisi/(:any)/(:any)','Api::getTeknisi/$1/$2');
$routes->get('personal/(:any)','Api::getPersonal/$1/$2');
$routes->get('lokasi/(:any)','Api::getLokasi/$1');

$routes->post('kirimtiket', 'Api::kirimtiket');
/*

$routes->get('tcard/(:any)/(:num)/(:num)', 'Api::getTcard/$1/$2/$3');
$routes->get('absen/(:any)/(:num)', 'Api::getAbsen/$1/$2');
$routes->get('gajiop/(:any)/(:any)', 'Api::getGajiop/$1/$2');
$routes->get('gajistaf/(:any)/(:any)/(:any)', 'Api::getGajistaf/$1/$2/$3');
$routes->get('versi', 'Api::getVersi');
$routes->get('info', 'Api::getInfo');
$routes->get('infostaf', 'Api::getInfostaf');
$routes->get('cutistaf/(:any)', 'Api::getCutistaf/$1');
$routes->get('saran/(:any)', 'Api::getSaran/$1');
$routes->put('passwd', 'Api::updatePassword');
$routes->post('kirimsaran', 'Api::KirimSaran');
$routes->post('masuk', 'Api::absenMasuk');
$routes->post('pulang', 'Api::absenPulang');
*/