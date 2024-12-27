<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('detail_product', 'Home::detail_product');
$routes->get('contact', 'Home::contact');
$routes->get('images/(:segment)', 'Home::images/$1');

service('auth')->routes($routes);

// Categories
$routes->get('admin/category', 'AdminController::category');
$routes->post('admin/category', 'AdminController::create_category');
$routes->get('admin/category/(:segment)/edit', 'AdminController::edit_category/$1');
$routes->post('admin/category/(:segment)/update', 'AdminController::update_category/$1');
$routes->get('admin/category/(:segment)/delete', 'AdminController::delete_category/$1');

// Product
$routes->get('admin/product', 'AdminController::product');
$routes->post('admin/product', 'AdminController::create_product');
$routes->get('admin/product/(:segment)/edit', 'AdminController::edit_product/$1');
$routes->post('admin/product/(:segment)/update', 'AdminController::update_product/$1');
$routes->get('admin/product/(:segment)/delete', 'AdminController::delete_product/$1');

// Contact
$routes->get('admin/contact', 'AdminController::contact');
$routes->post('admin/contact', 'AdminController::create_contact');
$routes->get('admin/contact/(:segment)/edit', 'AdminController::edit_contact/$1');
$routes->post('admin/contact/(:segment)/update', 'AdminController::update_contact/$1');
$routes->get('admin/contact/(:segment)/delete', 'AdminController::delete_contact/$1');

// Admin
// $routes->group('admin', ['filter' => 'group:admin'], function ($routes) {
//     $routes->get('dashboard', 'AdminController::dashboard');
//     $routes->get('databuku', 'AdminController::databuku');
//     $routes->get('datatransaksi', 'AdminController::datatransaksi');
//     $routes->get('datapelanggan', 'AdminController::datapelanggan');
//     $routes->post('databuku', 'AdminController::create_buku');
//     $routes->get('databuku/(:segment)/edit', 'AdminController::edit_buku/$1');
//     $routes->post('databuku/(:segment)/update', 'AdminController::update_buku/$1');
// });