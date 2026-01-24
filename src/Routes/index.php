<?php

use Communitytable\Foodbank\Controllers\HomeController;
use Communitytable\Foodbank\Controllers\ShiftsController;
use Communitytable\Foodbank\Controllers\AuthController;
use Communitytable\Foodbank\Controllers\OpeningTimesController;
use Communitytable\Foodbank\Controllers\VolunteersController;

// public
$router->get('/', HomeController::class, 'index');

// authentication
$router->get('/login', AuthController::class, 'login');
$router->post('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout');

// register
$router->get('/register', AuthController::class, 'register');
$router->post('/register', AuthController::class, 'register');

// shifts
$router->get('/shifts', ShiftsController::class, 'index');
$router->get('/shifts/book', ShiftsController::class, 'book');
$router->post('/shifts/book', ShiftsController::class, 'confirm');
$router->get('/shifts/myShifts', ShiftsController::class, 'myShifts');

// volunteers
$router->get('/volunteers', VolunteersController::class, 'index');

// staff
$router->get('/shifts/edit', ShiftsController::class, 'edit');
$router->post('/shifts/update', ShiftsController::class, 'update');
$router->post('/shifts/delete', ShiftsController::class, 'delete');
$router->get('/shifts/create', ShiftsController::class, 'create');
$router->post('/shifts/store', ShiftsController::class, 'store');

//opening times
$router->get('/opening', OpeningTimesController::class, 'index');
$router->get('/opening/edit', OpeningTimesController::class, 'edit');
$router->post('/opening/save', OpeningTimesController::class, 'save');

