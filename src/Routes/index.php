<?php

use Communitytable\Foodbank\Controllers\HomeController;
use Communitytable\Foodbank\Controllers\ShiftController;
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
$router->get('/shifts', ShiftController::class, 'index');
$router->post('/shifts/book', ShiftController::class, 'book');
$router->get('/my-shifts', ShiftController::class, 'myShifts');

// // Staff
// $router->get('/staff/shifts', StaffController::class, 'index');
// $router->get('/staff/shifts/edit', StaffController::class, 'edit');
// $router->post('/staff/shifts/update', StaffController::class, 'update');
