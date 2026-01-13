<?php
require_once __DIR__ . '/../Models/Volunteers.php';

class VolunteersController
{
    public static function index(mysqli $conn): array
    {
        // The view expects $result, so name it $result here
        return $result = Volunteers::getAll($conn);

    }
}