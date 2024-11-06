<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

// Buat instance route
$routes = Services::routes();

// Atur default namespace dan controller
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home'); // Sesuaikan dengan default controller
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override('App\Controllers\MY_Exceptions::show_404'); // Menyesuaikan 404
$routes->setAutoRoute(true);

// Tambahkan routes custom
$routes->get('/', 'Home::index'); // Default controller, mengarah ke Home
$routes->get('login', 'Home::login');
$routes->get('login_failure', 'Home::login');
$routes->get('dashboard', 'Home::index');
$routes->get('item', 'Newitem::index'); // Sesuaikan dengan controller 'Newitem'
$routes->get('model', 'Stock::index'); // Sesuaikan dengan controller 'Stock'
$routes->get('proses', 'Mesin::index'); // Sesuaikan dengan controller 'Mesin'
$routes->get('monitoring', 'Monitoring::index'); // Sesuaikan dengan controller 'Monitoring'
$routes->get('report', 'Report::index'); // Sesuaikan dengan controller 'Report'

// Jika ada file Routes sistem, load juga
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
