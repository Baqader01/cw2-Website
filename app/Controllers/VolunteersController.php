<?php
require_once __DIR__ . '/../Models/Volunteers.php';

class VolunteersController
{
    public static function index(mysqli $conn)
    {
        // The view expects $result, so name it $result here
        $result = Volunteers::getAll($conn);

        require __DIR__ . '/../Views/Volunteers.php';
    }
}