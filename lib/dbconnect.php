<?php
$config = parse_ini_file(__DIR__ . '/../config/config.ini', true);

// Basic safety check
if ($config === false || !isset($config['database'])) {
    die('Database configuration not found.');
}

$db = $config['database'];

// Create the connection object
$conn = mysqli_connect( $db['host'], $db['username'], $db['password'], $db['dbname']);

// Check the connection worked
if ($conn->connect_error) {
    // If something goes wrong, stop the page and show the error
    die("Database connection failed: " . $conn->connect_error);
}
