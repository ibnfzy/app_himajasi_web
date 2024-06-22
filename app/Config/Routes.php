<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/Login', 'Login::index');
$routes->post('/Login/auth', 'Login::auth');
$routes->get('/Login/logoff', 'Login::logoff');

$routes->group('Panel', function (RouteCollection $routes) {
  $routes->get('/', 'PanelController::index');
  $routes->post('Kegiatan', 'PanelController::kegiatan_insert');
  $routes->get('Kegiatan/(:num)', 'PanelController::kegiatan_delete/$1');
  $routes->post('Kegiatan/update', 'PanelController::kegiatan_update');
});