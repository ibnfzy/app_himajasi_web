<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('upload-image', 'PanelController::upload_image');
$routes->post('delete-image', 'PanelController::deleteImage');

$routes->get('/Login', 'Login::index');
$routes->post('/Login/auth', 'Login::auth');
$routes->get('/Login/logoff', 'Login::logoff');

$routes->group('Panel', function (RouteCollection $routes) {
  $routes->get('/', 'PanelController::dashboard');

  $routes->get('Kegiatan', 'PanelController::index');
  $routes->post('Kegiatan', 'PanelController::kegiatan_insert');
  $routes->get('Kegiatan/(:num)', 'PanelController::kegiatan_delete/$1');
  $routes->post('Kegiatan/update', 'PanelController::kegiatan_update');
});
