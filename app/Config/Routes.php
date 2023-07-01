<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
// app/Config/Routes.php

$routes->get('/', 'Tasks::index'); // Menghubungkan URL utama ke fungsi index() pada kontroler Tasks

$routes->get('tasks/create', 'Tasks::create'); // Menghubungkan URL tasks/create ke fungsi create() pada kontroler Tasks
$routes->post('tasks/store', 'Tasks::store'); // Menghubungkan URL tasks/store ke fungsi store() pada kontroler Tasks

$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1'); // Menghubungkan URL tasks/edit/id_kegiatan ke fungsi edit() pada kontroler Tasks
$routes->post('tasks/update/(:num)', 'Tasks::update/$1'); // Menghubungkan URL tasks/update/id_kegiatan ke fungsi update() pada kontroler Tasks

$routes->post('tasks/delete/(:num)', 'Tasks::delete/$1'); // Menghubungkan URL tasks/delete/id_kegiatan ke fungsi delete() pada kontroler Tasks
