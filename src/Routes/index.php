<?php

use Communitytable\Foodbank\Controllers\HomeController;
use Communitytable\Foodbank\Controllers\ShiftsController;
use Communitytable\Foodbank\Controllers\AuthController;

// Public
$router->get('/', HomeController::class, 'index');

// Auth
$router->get('/login', AuthController::class, 'login');
$router->post('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout');

$router->get('/register', AuthController::class, 'register');
$router->post('/register', AuthController::class, 'register');

// Volunteer
$router->get('/shifts', ShiftsController::class, 'index');
$router->post('/shifts/book', ShiftsController::class, 'book');
$router->get('/my-shifts', ShiftsController::class, 'myShifts');

// // Staff
// $router->get('/staff/shifts', ShiftsController::class, 'index');
// $router->get('/staff/shifts/edit', ShiftsController::class, 'edit');
// $router->post('/staff/shifts/update', ShiftsController::class, 'update');
