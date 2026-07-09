<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->group('produk', ['filter' => 'auth'], function ($routes) {

    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');

    // TAMBAHKAN INI
    $routes->get('download', 'ProdukController::download');

});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});

$routes->get('keranjang', 'TransaksiController::index', ['filter' => 'auth']);
$routes->get('/faq', 'Home::faq', ['filter' => ['auth', 'role']]);
$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->get('contact', 'Home::contact', ['filter' => 'auth']);

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);
$routes->get('history', 'TransaksiController::history', ['filter' => 'auth']);

$routes->get('ajax/destinations','TransaksiController::destinations', ['filter' => 'auth']);
$routes->get('ajax/costs','TransaksiController::costs', ['filter' => 'auth']);

$routes->resource('api/products', ['controller' => 'Api\ProdukController']);
$routes->resource('api/discounts', [
    'controller' => 'Api\DiscountController'
]);

$routes->get('api/transactions', 'Api\TransaksiController::index');

$routes->group('diskon', ['filter' => ['auth','role']], function ($routes){

    $routes->get('', 'DiscountController::index');
    $routes->post('', 'DiscountController::create');
    $routes->post('edit/(:num)', 'DiscountController::edit/$1');
    $routes->get('delete/(:num)', 'DiscountController::delete/$1');

});

$routes->group('pembelian', ['filter' => 'auth'], function ($routes) {

    $routes->get('', 'PembelianController::index');
    $routes->get('detail/(:num)', 'PembelianController::detail/$1');
    $routes->get('status/(:num)', 'PembelianController::status/$1');

});