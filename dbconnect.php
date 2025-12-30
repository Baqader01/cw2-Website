<?php
function db_connect()
{
    static $connection;

    if (!isset($connection)) {
        // Read from /var/www/private/config.ini
        $config = parse_ini_file('/var/www/private/config.ini');

        if ($config === false) {
            return 'Unable to read /var/www/private/config.ini';
        }

        $connection = mysqli_connect(
            $config['servername'],  // "database"
            $config['username'],    // "webdev"
            $config['password'],    // "W3bD£development"
            $config['dbname']       // "foodbank"
        );
    }

    if ($connection === false) {
        return mysqli_connect_error();
    }

    return $connection; // mysqli object
}
