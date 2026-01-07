<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', 'AuthController::index', ['as' => 'login']);
$routes->post('/', 'AuthController::postLogin', ['as' => 'login.post']);

$routes->get('/divisi', 'DivisiController::listDivisi', ['as' => 'divisi.list']);
$routes->get('/divisi/add', 'DivisiController::formTambahDivisi', ['as' => 'divisi.add']);
$routes->post('/divisi/add', 'DivisiController::postTambahDivisi', ['as' => 'divisi.add.post']);
$routes->get('/divisi/edit/(:num)', 'DivisiController::formEditDivisi/$1', ['as' => 'divisi.edit']);
$routes->post('/divisi/edit', 'DivisiController::postEditDivisi', ['as' => 'divisi.edit.post']);
$routes->get('/divisi/delete', 'DivisiController::deleteDivisi', ['as' => 'divisi.delete']);
