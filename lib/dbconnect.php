<?php

function db_connect(): mysqli
{
    $config = parse_ini_file(__DIR__ . '/../private/config.ini', true);

    // Basic safety check
    if ($config === false || !isset($config['database'])) {
        die('Database configuration not found.');
    }

    $db = $config['database'];

    // Create connection
    $conn = mysqli_connect(
        $db['servername'],
        $db['username'],
        $db['password'],
        $db['dbname']
    );

    // If mysqli_connect fails it returns false
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

?>