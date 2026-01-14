<?php
require_once __DIR__ . '/../lib/dbconnect.php';
require_once __DIR__ . '/../vendor/autoload.php';

use Communitytable\Foodbank\Core\Router;

session_start();

$router = new Router;

// Load routes
require_once __DIR__ . '/../src/Routes/index.php';

// Dispatch request
$router->dispatch();
