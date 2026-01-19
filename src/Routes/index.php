<?php

use Communitytable\Foodbank\Controllers\HomeController;
use Communitytable\Foodbank\Controllers\ShiftsController;
use Communitytable\Foodbank\Controllers\AuthController;
use Communitytable\Foodbank\Controllers\VolunteersController;

// Public
$router->get('/', HomeController::class, 'index');

// Auth
$router->get('/login', AuthController::class, 'login');
$router->post('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout');

$router->get('/register', AuthController::class, 'register');
$router->post('/register', AuthController::class, 'register');

$router->get('/shifts', ShiftsController::class, 'index');
$router->get('/shifts/book', ShiftsController::class, 'book');
$router->post('/shifts/book', ShiftsController::class, 'confirm');
$router->get('/shifts/myShifts', ShiftsController::class, 'myShifts');

$router->get('/volunteers', VolunteersController::class, 'index');

// Staff
$router->get('/shifts/edit', ShiftsController::class, 'edit');
$router->post('/shifts/update', ShiftsController::class, 'update');
$router->post('/shifts/delete', ShiftsController::class, 'delete');
